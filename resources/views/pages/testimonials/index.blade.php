@extends('layouts.front')
@section('title','اختبارات')
@section('f-content')
  <div class="testimonials-contain sectionBotPad">
    <div class="testimonials-head sectionPad wow fadeInUp">
      <strong>اختبارات مكتوبة</strong>
    </div>
    <div class="testimonials-body sectionPad">
      <div class="testimonials-swiper swiper-container">
        <div class="swiper-wrapper">
          @foreach ($testimonials as $testimonial)
            <div class="swiper-slide">
              <div class="testimonials-item">
                <div class="testimonials-item-head wow fadeInUp">
                  <strong>{{ $testimonial->title }}</strong>
                  <div class="custom-navigation-wrap">
                    <div class="custom-navigation">
                      <div class="custom-btn swiper-button-prev">
                        <div class="custom-btn-icon">
                          <img src="{{ asset('assets/images/icons/btn-arrow-prev-white.png') }}" alt="{{ $testimonial->title }}" />
                        </div>
                      </div>
                      <div class="custom-btn swiper-button-next">
                        <div class="custom-btn-icon">
                          <img src="{{ asset('assets/images/icons/btn-arrow-next-white.png') }}" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="testimonials-item-body">
                  <div class="dynamic-data-wrap wow fadeInUp">
                    {!! $testimonial->description !!}
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>  
@endsection
