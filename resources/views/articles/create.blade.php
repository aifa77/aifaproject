@extends('layout.master')
@section('create')
    <div class="jumbotron">
        <h1>Create An Article</h1>
        <p>What's on your mind?</p>
    </div>
    <div class="row">
        <form action="{{route('articles.store')}}" method="POST" class="col-sm-8" enctype="multipart/form-data">
            @include('articles.form')
        </form>
    </div>
@endsection