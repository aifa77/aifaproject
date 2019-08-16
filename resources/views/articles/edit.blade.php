@extends('layout.master')
@section('edit')
    <div class="jumbotron">
        <h1>Edit Article</h1>
        <p>Editing your article is fine</p>
    </div>
    <div class="row">
        <form action="{{route('articles.update', $articles->id)}}" method="POST" class="col-sm-8" enctype="multipart/form-data">
            {{csrf_field()}}{{method_field('PUT')}}
            <input type="text" name="title" placeholder="Title" value="{!! $articles->title !!}" class="form-control col-md-6" autofocus>
            <small class="text-danger">{{ $errors->first('title') }}</small><br>
            <textarea name="content" id="" cols="30" rows="10" placeholder="Content" class="form-control col-md-6">{!! $articles->content !!}</textarea>
            <small class="text-danger">{{ $errors->first('title') }}</small><br>
            <img src="{{asset($articles->images->file)}}" alt="" width="100px" height="100px">
            <input type="file" name="file" value="" class="form-control col-md-6">
            <small class="text-danger">{{ $errors->first('file') }}</small><br>
            <input type="button" value="Back" onclick="window.location.href='{{route('articles.show', $articles->id)}}';" class="btn btn-default">
            <input type="submit" name="submit" value="Save" class="btn btn-info">
        </form>
    </div>
@endsection