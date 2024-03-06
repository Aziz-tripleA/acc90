@extends('layouts.front')
@section('title','الاعلانات')
@section('meta')
  <meta name="description" content="{{isset($ad)?$ad->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta property="type" content="website"/>
  <meta property="url" content="{{request()->fullUrl()}}"/>
  <link rel="canonical" href="{{ URL::current() }}">
  {{-- <meta property="fb:app_id" content="1413929195661830"/> --}}
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:title" content="{{$ad->title}}"/>
  <meta name="twitter:description" content="{{isset($ad)?$ad->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta name="twitter:image" content="{{isset($ad) && $ad->cover ? asset($ad->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
  <meta property="og:title" content="{{$ad->title}}">
  <meta property="og:description" content="{{isset($ad)?$ad->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta property="og:image" content="{{isset($ad)&& $ad->cover ? asset($ad->getUrlFor('cover')) : asset('assets/front/logo.png')}}">
  <meta property="og:image:url" content="{{isset($ad) && $ad->cover ? asset($ad->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
  <meta property="og:image:secure_url" content="{{isset($ad) && $ad->cover ? asset($ad->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
@endsection
@section('f-content')

<div class="news-single-contains sectionBotPad">
  <div class="news-single-wrap sectionPad">
    <div class="news-single-content">
      <div class="news-single-body">
        <div class="dynamic-data-wrap wow fadeInUp">
          {!! $ad->description !!}
        </div>
      </div>
    </div>
    
  </div>
</div>
<div class="floating-social">
  <ul>
    @include('pages._partials.social-links-float')
    {{-- <li>
      <a
        class="facebook"
        href="#"
        target="_blank"
        rel="noopener noreferrer"
        ><img src="images/social/fb-white.png" alt=""
      /></a>
    </li>
    <li>
      <a
        class="twitter"
        href="#"
        target="_blank"
        rel="noopener noreferrer"
        ><img src="images/social/twitter-white.png" alt=""
      /></a>
    </li>
    <li>
      <a class="linked" href="#" target="_blank" rel="noopener noreferrer"
        ><img src="images/social/linkedin-white.png" alt=""
      /></a>
    </li>
    <li>
      <a class="share" href="#" target="_blank" rel="noopener noreferrer"
        ><img src="images/social/file-white.png" alt=""
      /></a>
    </li> --}}
  </ul>
</div>

@endsection
