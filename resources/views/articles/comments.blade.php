@if(count($comments)>0)
    @foreach($comments as $comment)
    <div class="well" style="width:560px">
        <p>{!! $comment->content !!}</p>
        <small>By <strong>{!! $comment->user !!}</strong> on {!! $comment->created_at !!}</small>
    </div>
    @endforeach
@else
    <h3>No comments</h3>
@endif