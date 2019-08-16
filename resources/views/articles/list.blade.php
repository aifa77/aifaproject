@foreach($articles as $article)
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">{!! $article->title !!}</h1>
            </div>
            <div class="panel-body">
                @if ($article->images['file']=='uploads/')
                    <img src="{{asset('uploads/default.png')}}" alt="" class="col-md-3">
                @else
                    <img src="{{asset($article->images['file'])}}" alt="" class="col-md-3">
                @endif
                <p class="col-md-6">{!! str_limit($article->content, 450) !!} <a href="{{route('articles.show', $article->id)}}">Read More</a></p>  
                <div class="col-md-3">
                    <small class="text-info">Created on {!! date('F j, Y', strtotime($article->created_at)) !!}</small><br>
                    <small class="text-primary">By <strong>{!! $article->users['name'] !!}</strong></small><br>
                    <small class="text-success">{!! $article->comments->count() !!} Comments</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{{$articles->links()}}