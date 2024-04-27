@extends('layouts.app')
@section('meta')
    <meta property="type" content="website"/>
    <meta property="url" content="{{request()->fullUrl()}}"/>
    <link rel="canonical" href="{{ URL::current() }}">
    {{-- <meta property="fb:app_id" content="1413929195661830"/> --}}
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="{{config('app.name') .' | '. $title}}"/>
    <meta name="twitter:image" content="{{isset($image) ?$image: asset('assets/front/logo.png')}}"/>
    <meta property="og:title" content="{{config('app.name') .' | '. $title}}">
    <meta property="og:image" content="{{isset($image) ?$image : asset('assets/front/logo.png')}}">
    <meta property="og:image:url" content="{{isset($image) ?$image: asset('assets/front/logo.png')}}"/>
    <meta property="og:image:secure_url" content="{{isset($image) ?$image: asset('assets/front/logo.png')}}"/>
    <meta property="og:image:type" content="image/*"/>
    <meta property="og:image:width" content="400"/>
    <meta property="og:image:height" content="300"/>
    <meta property="og:url" content="{{request()->fullUrl()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="{{config('app.name') .' | '. $title}}"/>
   @yield('f-meta')
@endsection
@section('styles')
    {{--put here your frond-end style name (front)--}}
    <!-- start: preload assets -->
    <link rel="preload" href="{{asset('assets/scripts/app.min.js')}}" as="script">
    <link rel="preload" href="{{asset('assets/styles/style.min-rtl.css')}}" as="style">
    <!-- end: preload assets -->


    <!-- start: style files -->
    <link rel="stylesheet" href="{{asset('assets/styles/style.min-rtl.css')}}">
    <!-- end: style files end/. -->    {{--if your project has custom front-end script file , remove this line --}}
    <script src="{{asset('assets/scripts/app.min.js')}}"></script>

    @yield('f-styles')
@endsection
@section('content')
    {{--if there's custom navbar in home page--}}
    @hasSection('home-nav')
        @yield('home-nav')
    @else
        {{--if the navbar in front-end different than in dashboard--}}
               @include('layouts.partials.front.top-nav')
        {{--if there're the same--}}
        {{-- @include('layouts.partials.top-nav') --}}
    @endif
    @isset($basic)
        @yield('f-content')
    @else
    <section class="data-contain">
        <div class="main-slider-contain auto-height @if (request()->is('*كتب/*')) books-single-slider @endif ">
          <div class="main-slider-wrap sectionPad">
            <div class="main-slider-item">
              <div class="main-slider-img-wrap wow fadeInUp">
                {{-- @if (!request()->is('*books/*')) --}}
                <div class="main-slider-img">
                  <img src="{{ isset($image)&&!empty($image)?$image:asset('assets/images/default_image.png') }}" alt="" />
                </div>
                {{-- @endif  --}}
              </div>
              @include('layouts.partials.breadcrumb')
            </div>
        </div>
      </div>
      @yield('f-content')

    </section>
    @endisset
    {{--if the footer in front-end different than in dashboard--}}
    {{--    @include('layouts.partials.front.footer')--}}
    {{--if there're the same--}}
    @include('layouts.partials.front.footer')
@endsection
@section('modals')
@endsection
@section('scripts')
    {{--put here your frond-end script file here (front)--}}
    @yield('f-scripts')
@endsection
