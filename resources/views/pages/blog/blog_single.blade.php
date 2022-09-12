@extends('layouts.master_home')

@section('home_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single" data-aos="fade-up">

              <div class="entry-img">
                <img src="{{ asset($article->entry_img) }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="">{{ $article->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="">{{ $author->full_name }}</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href=""><time>{{ $article->created_at }}</time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="">{{ $article->comments_count }} Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
              {!! $article->entry_content !!}

              {!! $article->main_content !!}

              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="{{ route('blog.category', $category->id) }}">{{ $category->category_name }}</a></li>
                  </ul>

                  <i class="icofont-tags"></i>
                  <ul class="tags">
                  @foreach($tags as $tag)
                    <li><a href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }}</a></li>
                  @endforeach
                  </ul>
                </div>

                <div class="float-right share">
                  <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                  <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                  <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                </div>

              </div>

            </article><!-- End blog entry -->

            <div class="blog-author clearfix" data-aos="fade-up">
              <img src="{{ asset($author->photo) }}" class="rounded-circle float-left" alt="">
              <h4>{{ $author->full_name }}</h4>
              <div class="social-links">
                <a href="https://twitters.com/#"><i class="icofont-twitter"></i></a>
                <a href="https://facebook.com/#"><i class="icofont-facebook"></i></a>
                <a href="https://instagram.com/#"><i class="icofont-instagram"></i></a>
              </div>
              {!! $author->about !!}
            </div><!-- End blog author bio -->

            <div class="blog-comments" data-aos="fade-up">

            <h4 class="comments-count">{{ count($comments) }} Comments</h4>

            @include('pages.blog.partials._comment_replies', ['comments' => $comments, 'article_id' => $article->id])

            @if(Auth::guard('web')->user())
  <div class="reply-form">
  <h4>Leave a Comment</h4>
  <p>Your email address will not be published. Required fields are marked * </p>
  <form method="POST" action="{{ route('comment.add') }}">
    @csrf
    <div class="row">
      <div class="col form-group">
        <textarea name="comment_body" class="form-control" placeholder="Your Comment*"></textarea>
        <input type="hidden" name="article_id" value="{{ $article->id }}" />
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Post Comment</button>

  </form>

</div>
@else
<p>Please, <a href="{{ route('login') }}">Login</a> to Leave a Comment</p>
@endif

            </div><!-- End blog comments -->
          {{ $comments->links('vendor.pagination.blog') }}

          </div><!-- End blog entries list -->

          @include('blog.sidebar.blog_search')

        </div>

      </div>
    </section><!-- End Blog Section -->

@endsection