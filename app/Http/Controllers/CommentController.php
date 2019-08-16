<?php

namespace App\Http\Controllers;

use App\Comment, App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Session, Redirect, Validator;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        Comment::create($request->all());
        $comments = Comment::where('article_id', $request->article_id)->orderBy('created_at', 'desc')->get();
        $view = (String) view('articles.comments')->with('comments', $comments)->render();
        return response()->json(['view' => $view, 'status' => 'success']);
    }
}
