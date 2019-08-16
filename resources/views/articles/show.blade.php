@extends('layout.master')
@section('show')
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
        <h1>{!! $articles->title !!}</h1>
        <p>Created on {!! date('F j, Y', strtotime($articles->created_at)) !!}</p>
        <p>By {!! $articles->users->name !!}</p>
    </div>
    <div class="row">
        <img src="{{asset($articles->images->file)}}" class="col-md-4" alt="">
        <p class="col-md-8">{!! $articles->content !!}</p>
    </div>
    
    @guest
    @else
        @if (Auth::user()->hasAnyRole(['manager','employee']))
            @if ($currentuser->id == $articles->users->id)
                <form action="{{route('articles.destroy', $articles->id)}}" method="POST">
                    {{csrf_field()}}{{method_field('DELETE')}}
                    <br>
                    <input type="button" value="Back" onclick="window.location.href='{{route('articles.index')}}';" class="btn btn-default">
                    <input type="button" value="Edit" onclick="window.location.href='{{route('articles.edit', $articles->id)}}';" class="btn btn-warning">
                    <input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                </form>
            @else 
                <div></div>
            @endif
        @endif
    @endguest
    <div class="row">
        <br>
        <form action="{{route('comments.store')}}" method="post" id="form-comment" name="form-comment" class="col-sm-6">
            {{ csrf_field() }}
            <input type="hidden" name="article_id" id="article_id" value={!! $articles->id !!} class="form-control" readonly>
            <textarea name="content" id="content" cols="30" rows="3" placeholder="Give some comments..." class="form-control"></textarea>
            <small class="text-danger">{{ $errors->first('content') }}</small>
            @guest
                <input type="text" name="user" id="user" placeholder="Username" class="form-control">
                <small class="text-danger">{{ $errors->first('user') }}</small>
            @else
                @if (Auth::user()->hasAnyRole(['manager','employee']))
                    <input type="hidden" name="user" id="user" value={!! $currentuser->name !!} class="form-control" readonly>
                @endif
            @endguest
            <input type="submit" name="comment" id="comment" value="Send" class="comment btn btn-primary">
        </form>
    </div>
    <br>
    <div class="comments_list" id="comments_list">
        @include('articles.comments')
    </div>
@stop
