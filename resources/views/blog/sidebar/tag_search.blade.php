<div class="col-lg-4">

<div class="sidebar" data-aos="fade-left">

<h3 class="sidebar-title">Search</h3>
<div class="sidebar-item search-form">
    <form action="{{ route('blog.tag', $tag->id) }}" method="GET">
        @csrf
    <input type="text" name="search" value="{{ $search }}" required>
    <button type="submit"><i class="icofont-search"></i></button>
    </form>

</div><!-- End sidebar search formn-->  

<h3 class="sidebar-title">Categories</h3>
<div class="sidebar-item categories">
<ul>
@foreach($categories as $cat)
<li><a href="{{ route('blog.category', $cat->id) }}">{{ $cat->category_name }} <span>({{ $cat->articles_count }})</span></a></li>
@endforeach
</ul>

</div><!-- End sidebar categories-->

<h3 class="sidebar-title">Recent Posts</h3>
<div class="sidebar-item recent-posts">
@foreach($recent as $post)
<div class="post-item clearfix">
<img src="{{asset($post->entry_img)}}" alt="">
<h4><a href="{{ route('blog.single', $post->id) }}">{{$post->title}}</a></h4>
<time>{{date("Y-m-d",strtotime($post->created_at))}}</time>
</div>
@endforeach
</div><!-- End sidebar recent posts-->

<h3 class="sidebar-title">Tags</h3>
<div class="sidebar-item tags">
<ul>
@foreach($tags as $tag)
<li><a href="{{ route('blog.tag', $tag->id) }}">{{ $tag->name }}</a></li>
@endforeach
</ul>

  </div><!-- End sidebar tags-->

</div><!-- End sidebar -->

</div><!-- End blog sidebar -->