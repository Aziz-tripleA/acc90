@extends('layouts.front')
@section('title',isset($course)?$course->title:'مواد تعليمية')

@section('meta')
  <meta name="description" content="{{isset($course)?$course->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta property="type" content="website"/>
  <meta property="url" content="{{request()->fullUrl()}}"/>
  <link rel="canonical" href="{{ URL::current() }}">
  {{-- <meta property="fb:app_id" content="1413929195661830"/> --}}
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:title" content="{{$course->title}}"/>
  <meta name="twitter:description" content="{{isset($course)?$course->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta name="twitter:image" content="{{isset($course) && $course->cover ? asset($course->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
  <meta property="og:title" content="{{$course->title}}">
  <meta property="og:description" content="{{isset($course)?$course->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta property="og:image" content="{{isset($course)&& $course->cover ? asset($course->getUrlFor('cover')) : asset('assets/front/logo.png')}}">
  <meta property="og:image:url" content="{{isset($course) && $course->cover ? asset($course->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
  <meta property="og:image:secure_url" content="{{isset($course) && $course->cover ? asset($course->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
@endsection
@section('f-content')

<div class="news-single-contains sectionBotPad">
  <div class="news-single-wrap sectionPad">
    <div class="news-single-content">
      <div class="news-single-body">
        @if ($course->type == 'text')
          @include('pages.courses.partials.content-text')
        @elseif ($course->type == 'audio')
          @include('pages.courses.partials.content-audio')
        @else
          @include('pages.courses.partials.content-video')
        @endif
      </div>
    </div>
    <div class="related-news">
      <div class="section-head wow fadeInUp">
        <h2 class="section-title">المزيد من المواد تعليمية</h2>
      </div>
      <div class="related-news-body">
        <div class="courses-listing-body">
          @foreach ($related_courses as $course)
              @include('pages.courses.partials.item')
          @endforeach  
        </div>
      </div>
    </div>
  </div>
</div>
<div class="floating-social">
  <ul>
    @include('pages._partials.social-links-float')
  </ul>
</div>

@endsection
