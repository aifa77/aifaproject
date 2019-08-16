@extends('layout.master')
@section('collection')
    <div class="jumbotron">
        <h1>{!! $movies['title'] !!}</h1>
        <h2>{!! $movies['tagline'] !!}</h2>
        <p>Genre(s): 
        @foreach ($movies['genres'] as $genre)
            {!! $genre['name'] !!},            
        @endforeach
        </p>
    </div>
    <div class="row">
        <img src="https://image.tmdb.org/t/p/w500/{!! $movies['backdrop_path'] !!}" class="col-md-5" alt="">
        <div class="col-md-7">
            <p><strong>Released Date: </strong>{!! date('F j, Y', strtotime($movies['release_date'])) !!}</p>
            <p><strong>Production Companies: </strong>
            @foreach ($movies['production_companies'] as $comp)
                {!! $comp['name'] !!},
            @endforeach
            </p>
            <p><strong>Runtime: </strong>{!! $movies['runtime'] !!} minutes</p>
            <p><strong>Overview: </strong> {!! $movies['overview'] !!}</p>
        </div>
    </div>
    <h3>Watch Trailer</h3>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{!! $v !!}" frameborder="0" allowfullscreen style="width: 40%; height: 40%;"></iframe>
    </div>
@endsection