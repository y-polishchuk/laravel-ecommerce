@extends('user.user_master')

@section('user')

  @php
  $sliders = DB::table('sliders')->where('page_id', 'user')->get();

  @endphp
  
  <style>
    /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
#hero {
  width: 100%;
  height: 70vh;
  background-color: rgba(0, 0, 0, 0.8);
  overflow: hidden;
  position: relative;
}

#hero .carousel, #hero .carousel-inner, #hero .carousel-item, #hero .carousel-item::before {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
}

#hero .carousel-container {
  display: flex;
  align-items: flex-end;
  justify-content: center;
  position: absolute;
  bottom: 60px;
  top: 70px;
  left: 55px;
  right: 55px;
}

#hero .carousel-content {
  background: rgba(4, 4, 4, 0.7);
  padding: 20px;
  color: #fff;
  -webkit-animation-duration: .5s;
  animation-duration: .5s;
  border-top: 5px solid #4c84ff;
}

#hero .carousel-content h2 {
  color: #fff;
  margin-bottom: 20px;
  font-size: 28px;
  font-weight: 700;
}

#hero .btn-get-started {
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 32px;
  border-radius: 4px;
  transition: 0.5s;
  line-height: 1;
  margin: 10px;
  color: #fff;
  -webkit-animation-delay: 0.8s;
  animation-delay: 0.8s;
  border: 2px solid #4c84ff;
}

#hero .btn-get-started:hover {
  background: #4c84ff;
  color: #fff;
  text-decoration: none;
}

#hero .carousel-inner .carousel-item {
  transition-property: opacity;
  background-position: center top;
}

#hero .carousel-inner .carousel-item,
#hero .carousel-inner .active.carousel-item-left,
#hero .carousel-inner .active.carousel-item-right {
  opacity: 0;
}

#hero .carousel-inner .active,
#hero .carousel-inner .carousel-item-next.carousel-item-left,
#hero .carousel-inner .carousel-item-prev.carousel-item-right {
  opacity: 1;
  transition: 0.5s;
}

#hero .carousel-inner .carousel-item-next,
#hero .carousel-inner .carousel-item-prev,
#hero .carousel-inner .active.carousel-item-left,
#hero .carousel-inner .active.carousel-item-right {
  left: 0;
  transform: translate3d(0, 0, 0);
}

#hero .carousel-control-prev, #hero .carousel-control-next {
  width: 10%;
  opacity: 1;
}

#hero .carousel-control-next-icon, #hero .carousel-control-prev-icon {
  background: none;
  font-size: 36px;
  line-height: 1;
  width: auto;
  height: auto;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50px;
  padding: 10px;
  transition: 0.3s;
  color: rgba(255, 255, 255, 0.5);
}

#hero .carousel-control-next-icon:hover, #hero .carousel-control-prev-icon:hover {
  background: rgba(255, 255, 255, 0.3);
  color: rgba(255, 255, 255, 0.8);
}

#hero .carousel-indicators li {
  cursor: pointer;
  background: #fff;
  overflow: hidden;
  border: 0;
  width: 12px;
  height: 12px;
  border-radius: 50px;
  opacity: .6;
  transition: 0.3s;
}

#hero .carousel-indicators li.active {
  opacity: 1;
  background: #4c84ff;
}

@media (min-width: 1024px) {
  #hero .carousel-content {
    width: 60%;
  }
  #hero .carousel-control-prev, #hero .carousel-control-next {
    width: 5%;
  }
}

@media (max-width: 992px) {
  #hero .carousel-container {
    top: 58px;
  }
  #hero .carousel-content h2 {
    margin-bottom: 15px;
    font-size: 22px;
  }
  #hero .carousel-content p {
    font-size: 15px;
  }
}

@media (max-height: 500px) {
  #hero {
    height: 120vh;
  }
}
  </style>
  
  <div class="py-12">
        
        <div class="container">
        <div class="row">

        
        <h2>Welcome To AREY Company User`s Dashboard</h2>
        <br><br>

        <div class="col-md-12">
        <div class="card">

        <div class="card-header">Join To Discover Our Website</div>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">

      @foreach($sliders as $key=>$slider)
        <!-- Slide 1 -->
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url({{ asset($slider->image) }});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>{{ strip_tags($slider->title) }}</h2>
              <p>{{ strip_tags($slider->description) }}</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>
      @endforeach
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  </div>
  </div>
  </div>
  </div>

  </div>

@endsection