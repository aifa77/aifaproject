<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Image;
use Auth;
use Session;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIarticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user;

    public function __construct()
    {
        // $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->user->articles()->get(['title','content'])->toArray();
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;

        if($this->user->articles()->save($article))
        {
            return response()->json([
                'success' => true,
                'article' => $article
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article could not be added'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->user->articles()->find($id);
        if(!$article)
        {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article with id '.$id.' cannot be found'
            ], 400);
        }
        return $article;
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
        $article = $this->user->articles()->find($id);
        if(!$article)
        {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article with id '.$id.' cannot be found'
            ], 400);
        }
        $updated = $article->fill($request->all())->save();
        if($updated)
        {
            return response()->json([
                'success' => true,
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article could not be updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = $this->user->articles()->find($id);
        if(!$article)
        {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article with id '.$id.' cannot be found'
            ], 400);
        }
        if($article->delete())
        {
            return response()->json([
                'success' => true,
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, article could not be deleted'
            ], 500);
        }
    }
}
