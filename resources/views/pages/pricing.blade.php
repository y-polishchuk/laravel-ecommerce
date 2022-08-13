@extends('layouts.master_home')

@section('home_content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Pricing</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Pricing</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="row">
@foreach($prices as $price)
        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box mt-4">
@if($price->advanced)
<span class="advanced">Advanced</span>
@endif
              <h3>{{ $price->title }}</h3>
              <h4><sup>$</sup>{{ $price->price }}<span> / month</span></h4>
              {!! $price->features !!}
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
@endforeach

        </div>

      </div>
    </section><!-- End Pricing Section -->

<!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="faq-list">
          <ul>
@php($i = 1)            
@foreach($faqs as $faq)
          <li data-aos="fade-up" >
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-{{ $i++ }}">{{ strip_tags($faq->question) }}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-{{ $i - 1 }}" class="collapse show" data-parent=".faq-list">
                <p>
                {{ strip_tags($faq->answer) }}
                </p>
              </div>
            </li>
@endforeach

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->


@endsection