@foreach($comments as $comment)
            <div id="comment-{{ $comment->id }}" class="comment {{ $comment->parent_id ? 'comment-reply' : '' }} clearfix">
              <img src="{{ $comment->user->profile_photo_path ? asset('storage/'.$comment->user->profile_photo_path) : Gravatar::get($comment->user->email) }}" class="comment-img  float-left" alt="">
              <h5><a href="">{{ $comment->user->name }}</a> <a data-toggle="collapse" href="#reply-{{ $comment->id }}" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
              <time datetime="2020-01-01">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</time>
              <p>
              {{ $comment->body }}
              </p>
@if(Auth::user())
    <div class="reply-form collapse" id="reply-{{ $comment->id }}">
    <form method="POST" action="{{ route('reply.add') }}">
    @csrf
    <div class="row">
      <div class="col form-group">
        <textarea name="comment_body" class="form-control" placeholder="Your Reply*"></textarea>
        <input type="hidden" name="article_id" value="{{ $article->id }}" />
        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Post Reply</button>

  </form>
  </div>
@else
<p class="collapse" id="reply-{{ $comment->parent_id }}">Please, <a href="{{ route('login') }}">Login</a> to Leave a Reply</p>
@endif
        @include('pages.blog.partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach
