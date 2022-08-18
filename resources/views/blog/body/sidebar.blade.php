<div class="col-lg-4">

            <div class="sidebar" data-aos="fade-left">

              

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
                  <h4><a href="blog-single.html">{{$post->title}}</a></h4>
                  <time>{{date("Y-m-d",strtotime($post->created_at))}}</time>
                </div>
@endforeach
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->
