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

      <div class="d-flex justify-content-between">
          <h3>{{ $tag->name }} Tag</h3>
          <ol>

        <div class="row">

          <div class="col-lg-8 entries">

@foreach($articles as $article)

            <article class="entry" data-aos="fade-up">

              <div class="entry-img">
                <img src="{{ asset($article->entry_img) }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="">{{ $article->title }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="">{{ $article->author->full_name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href=""><time>{{ date("Y-m-d",strtotime($article->created_at)) }}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="">{{ $article->comments_count }} Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                  {!! $article->entry_content !!}
                <div class="read-more">
                  <a href="{{ route('blog.single', $article) }}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
@endforeach

                {{ $articles->links('vendor.pagination.blog') }}

          </div><!-- End blog entries list -->

@include('blog.sidebar.tag_search')

        </div>

      </div>
    </section><!-- End Blog Section -->




@endsection