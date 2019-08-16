<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MovieController extends Controller
{
    public function movie()
    {
        $toprated = movie('movie/top_rated?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US&region=US&page=1');
        $popular = movie('movie/popular?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US&region=US&page=1');
        $upcoming = movie('movie/upcoming?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US&region=US&page=1');
        $genres = movie('genre/movie/list?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US');
        return view('new.collection')->with('toprated', $toprated)->with('genres', $genres)->with('popular', $popular)->with('upcoming', $upcoming);
    }
    public function movieDetails($id)
    {
        $movies = movie('movie/'.$id.'?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US');
        $trailer = movie('movie/'.$id.'/videos?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US');
        foreach ($trailer['results'] as $video)
        {
            $v = $video['key'];
            return view('new.details')->with('movies', $movies)->with('v', $v);
        }
    }
    public function searchMovie(Request $request)
    {
        $word = $request->search;
        $search = movie('search/movie?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US&query='.$word.'&page=1&include_adult=false');
        $genres = movie('genre/movie/list?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US');
        return view('new.search')->with('search', $search)->with('genres', $genres);
    }
    public function showTrailer($id)
    {
        $trailer = movie('movie/'.$id.'/videos?api_key=b7c1f0e63c2eb50b02b0f8e4425adc0d&language=en-US');
        foreach ($trailer['results'] as $video)
        {
            return redirect('https://www.youtube.com/watch?v='.$video['key']);
        }
    }
}
