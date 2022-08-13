@extends('layouts.master_home')

@section('home_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<!-- ======= About Us Section ======= -->
<section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{ $homeabout->title }}</h2>
            <h3>{!! $homeabout->short_des !!}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>
            {!! $homeabout->long_des !!}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

<!-- ======= Our Team Section ======= -->
<section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
@foreach($teamMembers as $member)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="{{ asset($member->photo) }}" class="img-fluid" alt="">
                <div class="social">
                  <a href="{{ $member->twitter }}"><i class="icofont-twitter"></i></a>
                  <a href="{{ $member->facebook }}"><i class="icofont-facebook"></i></a>
                  <a href="{{ $member->instagram }}"><i class="icofont-instagram"></i></a>
                  <a href="{{ $member->linkedin }}"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $member->name }}</h4>
                <span>{{ $member->position }}</span>
              </div>
            </div>
          </div>
@endforeach
          

        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Our Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Skills</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">
@php
$count = count($skills);
$half = round($count/2);
@endphp
@for($i = 0; $i < $half; $i++)
            <div class="progress">
              <p><span class="skill">{{ $skills[$i]->skill_name }} <i class="val">{{ $skills[$i]->value }}%</i></span></p>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skills[$i]->value }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
@endfor
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

@for($i = $half; $i < $count; $i++)
            <div class="progress">
              <p><span class="skill">{{ $skills[$i]->skill_name }} <i class="val">{{ $skills[$i]->value }}%</i></span></p>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skills[$i]->value }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
@endfor

          </div>

        </div>

      </div>
    </section><!-- End Our Skills Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">
@foreach($brands as $brand)
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
              <img src="{{ $brand->brand_image }}" class="img-fluid" alt="">
            </div>
          </div>
@endforeach
          
        </div>

      </div>
    </section><!-- End Our Clients Section -->
@endsection