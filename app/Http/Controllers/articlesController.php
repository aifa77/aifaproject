<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Image;
use Auth;
use Session;

class articlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $articles = Article::with('users','comments','images')->orderBy('id', 'desc')->where('title','like','%'. $request->search .'%')->orWhere('content','like','%'. $request->search .'%')->paginate(4);
            $view = (String) view('articles.list')->with('articles', $articles)->render();
            return response()->json(['view' => $view, 'status' => 'success']);
        }
        $articles = Article::with('users','comments','images')->orderBy('id', 'desc')->where('title','like','%'. $request->search .'%')->orWhere('content','like','%'. $request->search .'%')->paginate(4);
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Auth::user();
        return view('articles.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $file = $request->file('file');
        $destination_path = 'uploads/';
        if ($file==null)
        {
            $filename = null;
        }
        else
        {
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
        }
        
        $articles = Article::create($request->all());
        Session::flash("flash_message", "Article created successfully");

        $image = new Image;
        $image->article_id = $articles->id;
        $image->file = $destination_path . $filename;
        $image->save();

        return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::with('images','users')->where('id',$id)->first();
        $currentuser = Auth::user();
        $comments = $articles->comments->sortBy('Comment.created_at');
        return view('articles.show')->with('articles', $articles)->with('comments', $comments)->with('currentuser', $currentuser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        $images = $articles->with('images')->first();
        return view('articles.edit')->with('articles', $articles)->with('images', $images);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('file');
        $destination_path = 'uploads/';
        if ($file==null)
        {
            $filename = null;
        }
        else
        {
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $file->move($destination_path, $filename);
        }
        
        $articles = Article::find($id)->update($request->all());
        Session::flash("flash_message", "Article updated successfully");

        Image::where('article_id', $id)->delete();

        $image = new Image;
        $image->article_id = $id;
        $image->file = $destination_path . $filename;
        $image->save();

        return redirect()->route('articles.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        Session::flash("flash_message", "Article deleted successfully");
        return redirect()->route('articles.index');
    }
}
