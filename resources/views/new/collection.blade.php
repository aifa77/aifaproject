@extends('layout.master')
@section('collection')
    <div class="jumbotron">
        <h1>Collection</h1>
        <h2>This is My Movies Collection</h2>
        <p>Just a few but I love them all</p>
    </div>
    <div class="panel-group" id="accordion">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    <span><a href="#top-rated" data-toggle="collapse" data-parent="#accordion" class="label label-success">Top Rated</a></span>
                    <span><a href="#popular" data-toggle="collapse" data-parent="#accordion" class="label label-primary">Popular</a></span>
                    <span><a href="#upcoming" data-toggle="collapse" data-parent="#accordion" class="label label-warning">Upcoming</a></span>
                </h3>
            </div>
            <div class="col-md-4">
                <form action={{ route('search') }} method="get" class="form-inline">
                    <br>
                    <input type="text" name="search" id="search" class="form-control">
                    <input type="submit" name="submit" value="Search" class="btn btn-default">
                </form>
            </div>
        </div><br>

        <div class="panel panel-default">
            <div class="row collapse in" id="top-rated">
            @php
                shuffle($toprated['results']);
            @endphp
            @foreach ($toprated['results'] as $movie)
                <div class="col-md-3" style="grid-auto-flow:column">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1 class="panel-title">{!! str_limit($movie['title'], 22) !!}</h1>
                        </div>
                        <div class="panel-body">
                            <img src="https://image.tmdb.org/t/p/w200/{!! $movie['poster_path'] !!}" alt="" class="col-md-12">
                            <p style="text-align:center"><strong>Rating  &#11088 {!! $movie['vote_average'] !!} ({!! date('Y', strtotime($movie['release_date'])) !!})</strong></p>
                            <p style="text-align:center"><strong>Genre(s): <br>
                            @foreach ($movie['genre_ids'] as $gen)
                                @foreach ($genres['genres'] as $genre)
                                    @if ($gen == $genre['id'])
                                        {!! $genre['name'] !!}, 
                                    @else
                                        
                                    @endif                            
                                @endforeach
                            @endforeach
                            etc.</strong></p>
                            <p style="text-align:center"></p>
                            <a href="{{route('details', $movie['id'])}}" class="btn btn-success col-md-6">Details</a>
                            <a href="{{route('showtrailer', $movie['id'])}}" class="btn btn-info col-md-6" target="_blank">Trailer</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        <div class="panel panel-default">
            <div class="row collapse" id="popular">
            @php
                shuffle($popular['results']);
            @endphp
            @foreach ($popular['results'] as $movie)
                <div class="col-md-3" style="grid-auto-flow:column">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1 class="panel-title">{!! str_limit($movie['title'], 22) !!}</h1>
                        </div>
                        <div class="panel-body">
                            <img src="https://image.tmdb.org/t/p/w200/{!! $movie['poster_path'] !!}" alt="" class="col-md-12">
                            <p style="text-align:center"><strong>Rating  &#11088 {!! $movie['vote_average'] !!} ({!! date('Y', strtotime($movie['release_date'])) !!})</strong></p>
                            <p style="text-align:center"><strong>Genre(s): <br>
                            @foreach ($movie['genre_ids'] as $gen)
                                @foreach ($genres['genres'] as $genre)
                                    @if ($gen == $genre['id'])
                                        {!! $genre['name'] !!}, 
                                    @else
                                        
                                    @endif                            
                                @endforeach
                            @endforeach
                            etc.</strong></p>
                            <p style="text-align:center"></p>
                            <a href="{{route('details', $movie['id'])}}" class="btn btn-success col-md-6">Details</a>
                            <a href="{{route('showtrailer', $movie['id'])}}" class="btn btn-info col-md-6" target="_blank">Trailer</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        <div class="panel panel-default">
            <div class="row collapse" id="upcoming">
            @php
                shuffle($upcoming['results']);
            @endphp
            @foreach ($upcoming['results'] as $movie)
                <div class="col-md-3" style="grid-auto-flow:column">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1 class="panel-title">{!! str_limit($movie['title'], 22) !!}</h1>
                        </div>
                        <div class="panel-body">
                            <img src="https://image.tmdb.org/t/p/w200/{!! $movie['poster_path'] !!}" alt="" class="col-md-12">
                            <p style="text-align:center"><strong>Rating  &#11088 {!! $movie['vote_average'] !!} ({!! date('Y', strtotime($movie['release_date'])) !!})</strong></p>
                            <p style="text-align:center"><strong>Genre(s): <br>
                            @foreach ($movie['genre_ids'] as $gen)
                                @foreach ($genres['genres'] as $genre)
                                    @if ($gen == $genre['id'])
                                        {!! $genre['name'] !!}, 
                                    @else
                                        
                                    @endif                            
                                @endforeach
                            @endforeach
                            etc.</strong></p>
                            <p style="text-align:center"></p>
                            <a href="{{route('details', $movie['id'])}}" class="btn btn-success col-md-6">Details</a>
                            <a href="{{route('showtrailer', $movie['id'])}}" class="btn btn-info col-md-6" target="_blank">Trailer</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection