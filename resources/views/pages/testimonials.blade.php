@extends('layouts.master_home')

@section('home_content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Testimonials</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Testimonials</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="row">
@foreach($testimonials as $tes)
          <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item mt-4">
              <img src="{{ asset($tes->photo) }}" class="testimonial-img" alt="">
              <h3>{{ $tes->name }}</h3>
              <h4>{{ $tes->position }}</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {{ strip_tags($tes->text) }}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
@endforeach

        </div>

      </div>
    </section><!-- End Testimonials Section -->




@endsection