<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['about','contact','story']]);
    }
    public function home(Request $request) {
        if($request->user()->hasRole(['manager']))
        {
            return redirect()->route('manager');
        }
        elseif($request->user()->hasRole(['employee']))
        {
            return redirect()->route('employee');
        }
    }
    public function about() {
        return view('statics.about');
    }

    public function gallery() {
        return view('statics.gallery');
    }

    public function contact() {
        return view('statics.contact');
    }

    public function story() {
        return view('new.story');
    }
}
