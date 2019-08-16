@extends('layout.master')
@section('content')
    <div class="jumbotron">
        @if (Session::has('error'))
        <div class="alert alert-danger">
            <strong>{{Session::get('error')}}</strong>
        </div>
        @elseif (Session::has('flash_message'))
        <div class="alert alert-success">
            <strong>{{Session::get('flash_message')}}</strong>
        </div>
        @endif
        <h1>Article Lists</h1>
        <p>A great article comes from a great mind</p>
        @guest
            <h2>You are not logged in</h2>
        @else
            @if (Auth::user()->hasRole(['manager']))
                <h2>You are a manager</h2>
                <button class="btn btn-lg btn-primary" onclick="window.location.href='{{route('articles.create')}}';">Create New Article</button>
            @else
                <h2>You are an employee</h2>
                <button class="btn btn-lg btn-primary" onclick="window.location.href='{{route('articles.create')}}';">Create New Article</button>
            @endif
        @endguest
    </div>
    <div class="row">
        <div class="col-md-8">
            {{$articles->links()}}
        </div>
        <div class="col-md-4">
            <form action={{ route('articles.index') }} method="get" class="">
                <br>
                <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
    <div class="articles_list mt-25" id="articles_list">
        <br>
        @include('articles.list')
    </div>
@stop 