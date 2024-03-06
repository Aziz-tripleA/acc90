@extends('layouts.front')
@section('title',isset($article)?$article->title:'المقالات')
@section('meta')
  <meta name="description" content="{{isset($article)?$article->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta property="type" content="website"/>
  <meta property="url" content="{{request()->fullUrl()}}"/>
  <link rel="canonical" href="{{ URL::current() }}">
  {{-- <meta property="fb:app_id" content="1413929195661830"/> --}}
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:title" content="{{$article->title}}"/>
  <meta name="twitter:description" content="{{isset($article)?$article->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta name="twitter:image" content="{{isset($article) && $article->cover ? asset($article->getUrlFor('cover')) : asset('assets/images/default_image.png')}}"/>
  <meta property="og:title" content="{{$article->title}}">
  <meta property="og:description" content="{{isset($article)?$article->title:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta property="og:image" content="{{isset($article)&& $article->cover ? asset($article->getUrlFor('cover')) : asset('assets/images/default_image.png')}}">
  <meta property="og:image:url" content="{{isset($article) && $article->cover ? asset($article->getUrlFor('cover')) : asset('assets/images/default_image.png')}}"/>
  <meta property="og:image:secure_url" content="{{isset($article) && $article->cover ? asset($article->getUrlFor('cover')) : asset('assets/images/default_image.png')}}"/>
@endsection
@section('f-content')

<div class="news-single-contains sectionBotPad">
  <div class="news-single-wrap sectionPad">
    <div class="news-single-content">
      <div class="news-single-body">
        <div class="dynamic-data-wrap wow fadeInUp">
          {!! $article->fulltext !!}
        </div>
      </div>
    </div>
    {{-- @if(is_array($other_articles) && sizeof($other_articles)>0) --}}
      <div class="related-news">
        <div class="section-head wow fadeInUp">
          <h2 class="section-title">مقالات اخري</h2>
        </div>
        <div class="related-news-body">
          <div class="related-news-items-wrap">
            @foreach ($other_articles as $article)
              @include('pages.articles.partials.item') 
            @endforeach 
          </div>
        </div>
      </div>
    {{-- @endif --}}
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
