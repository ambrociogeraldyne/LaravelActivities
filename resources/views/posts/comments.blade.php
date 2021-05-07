@if ($comments)
    <h5 style="margin-top: 10px; font-weight: bold;"> Comments </h5>
        @foreach ($comments as $comment)
            <p>{{ $comment->description }}</p>    

            <a href="" id="reply"></a>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="description" class="form-control" />
                    <input type="hidden" name="post_id" value="{{ $comment->post_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Reply" />
                </div>
            </form>
        @endforeach                         
@endif
                    
<h5 style="margin-top: 15px; font-weight: bold;">Add Comment:</h5>

<form method="POST" action="{{ route('comments.store') }}">
    @csrf
    <div class="form-group">
        <textarea class="form-control" name="description"></textarea>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Add Comment"> 
    </div>
</form>