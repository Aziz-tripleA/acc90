<!DOCTYPE html>

    @php
        $dir = "ltr";
		$description = "لنقدم المشورة والتعليم، والحث والتشجيع
في كل حكمة ممكنة, لكي نحضر كل إنسان ناضجاً في المسيح يسوع";
    @endphp
<html lang="ar" dir="rtl">
<head>
    <!-- start: meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="{{$description}}"/>
    <meta property="type" content="website"/>
    <meta property="url" content="{{request()->fullUrl()}}"/>
    {{-- <meta property="fb:app_id" content="1413929195661830"/> --}}
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="{{config('app.name')}}"/>
    <meta name="twitter:description" content="{{$description}}"/>
    <meta name="twitter:image" content="{{isset($home) ? asset($home->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
    <meta property="og:title" content="{{config('app.name')}}">
    <meta property="og:description" content="{{$description}}"/>
    <meta property="og:image" content="{{isset($home) ? asset($home->getUrlFor('cover')) : asset('assets/front/logo.png')}}">
    <meta property="og:image:url" content="{{isset($home) ? asset($home->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
    <meta property="og:image:secure_url" content="{{isset($home) ? asset($home->getUrlFor('cover')) : asset('assets/front/logo.png')}}"/>
    <meta property="og:image:type" content="image/*"/>
    <meta property="og:image:width" content="400"/>
    <meta property="og:image:height" content="300"/>
    <meta property="og:url" content="{{request()->fullUrl()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="{{config('app.name')}}"/>
    <!-- end: meta tags -->

    <!-- start: title-->
    <title>خدمة المشورة والنضج المسيحي</title>
    <!-- end: title -->

    <!-- start: favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/icons/favicon.png')}}"><!-- stylesheets-->

    <meta name="apple-mobile-web-app-title" content="{{config('app.name')}}">
    <meta name="application-name" content="{{config('app.name')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- end: favicon -->

    <!-- start: preload assets -->
    <link rel="preload" href="{{asset('assets/scripts/app.min.js')}}" as="script">
    <link rel="preload" href="{{asset('assets/styles/style.min-rtl.css')}}" as="style">
    <!-- end: preload assets -->


    <!-- start: style files -->
    <link rel="stylesheet" href="{{asset('assets/styles/style.min-rtl.css')}}">
    <!-- end: style files end/. -->
    <style>
        .fit-image{
            object-position: center !important;
        }
    </style>
</head>
<body>

@include('layouts.partials.front.top-nav')

<section class="data-contain">
    <div class="main-slider-contain">
        <div class="main-slider-wrap sectionPad">
            <div class="main-slider-item">
                <div class="main-slider-img-wrap wow fadeInUp">
                    <div class="main-slider-img">
                        <img src="{{isset($home)&& $home->getUrlFor('cover')?$home->getUrlFor('cover'):asset('assets/images/backgrounds/img1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="main-slider-data wow fadeInUp">
                    <h1 class="section-title">{{isset($home)&&$home->first_section_title&&$locale=='en'?GoogleTranslate::trans($home->first_section_title, $locale):$home->first_section_title}}</h1>
                    <p>{{(isset($home)&&$home->first_section_subtitle&&$locale=='en')?GoogleTranslate::trans($home->first_section_subtitle, 'en'):$home->first_section_subtitle}}</p>
                    <a class="site-btn" href="{{ route('service.index') }}">{{GoogleTranslate::trans('المزيد عن الخدمة ', $locale?:'ar')}}</a>
                </div>
            </div>
        </div>
        <ul class="main-intro-social wow fadeIn">
            @include('pages._partials.social-links',['color'=>'white'])
        </ul>

{{--        <div class="translate-page-btn wow fadeInUp changeLang" style="cursor: pointer;" href=""><span>TRANSLATE PAGE </span>--}}
{{--            <img src="{{asset('assets/images/icons/translate-icon.png')}}" alt="">--}}
{{--        </div>--}}

        <div class="goTo-section wow fadeInUp">
            <a href="#next">
                <img src="{{asset('assets/images/icons/mouse.png')}}" alt="">
                <span>{{$locale=='en'?GoogleTranslate::trans('اكتشف المزيد', $locale):'اكتشف المزيد'}}</span>
            </a>
        </div>
    </div>
    <a class="youtube-link wow fadeInUp" target="_blank" href="{{$youtube}}" id="next">
        <div class="youtube-link-wrap">
            <div class="youtube-link-data">
                <div class="youtube-link-data-icon">
                    <img src="{{asset('assets/images/icons/youtube-follow.png')}}" alt="">
                </div>
                <div class="youtube-link-data-text">
                    <strong>{{isset($home)&&$locale == 'en'? GoogleTranslate::trans($home->second_section_title, $locale):$home->second_section_title}}</strong>
                    <p>{{isset($home)&&$locale == 'en'? GoogleTranslate::trans($home->second_section_subtitle, $locale):$home->second_section_subtitle}}</p>
                </div>
            </div>
            <div class="youtube-link-img">
                <img src="{{asset('assets/images/icons/youtube-big.png')}}" alt="">
            </div>
        </div>
    </a>
    <div class="studies-contain">
        <div class="studies-wrap">
            <div class="swiper-container studies-swiper">
                <div class="swiper-wrapper">
                    @if ($featured_ads)
                        @foreach ($featured_ads as $ad)
                            <div class="swiper-slide wow fadeInUp">
                                <div class="studies-item">
                                    <div class="studies-item-data"><strong>{{ $locale == 'en'?GoogleTranslate::trans($ad->title, $locale):$ad->title }}</strong>
                                        <p>{!! $locale == 'en'?GoogleTranslate::trans( strip_tags(substr($ad->description, 0, 150)), $locale):strip_tags(substr($ad->description, 0, 150)) !!} ...</p>
                                        <a class="site-btn primary" href="{{ route('ads.show',$ad->id) }}">{{ $locale == 'en'?GoogleTranslate::trans('معرفة المزيد ', $locale):'معرفة المزيد' }}</a>
                                        @include('pages._partials.custom-navigation')
                                    </div>
                                    <div class="studies-item-img">
                                        <img class="fit-image" src="{{isset($ad->cover)?$ad->cover->getUrl():asset('assets/images/default_image.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    @if ($featured_services)
                        @foreach ($featured_services as $service)
                            <div class="swiper-slide wow fadeInUp">
                                <div class="studies-item">
                                    <div class="studies-item-data"><strong>{{ $locale=='en'?GoogleTranslate::trans($service->name, $locale):$service->name}}</strong>
                                        <p>{!! $locale=='en'?GoogleTranslate::trans($service->description, $locale):$service->description !!}</p><a
                                            class="site-btn primary" href="{{ route('service.index').'?service='.$service->name }}">{{ $locale=='en'?GoogleTranslate::trans('معرفة المزيد ', $locale):'معرفة المزيد' }}</a>
                                        @include('pages._partials.custom-navigation')
                                    </div>
                                    <div class="studies-item-img">
                                        <img class="fit-image" src="{{isset($service->cover)?$service->cover->getUrl():asset('assets/images/default_image.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (count($services)>0)
        <div class="services-contain sectionTopPad sectionBotPad">
            <div class="services-wrap sectionPad">
                <div class="section-head wow fadeInUp"><h2 class="section-title">{{ $locale=='en'?GoogleTranslate::trans('ما نقدم من خدمات', 'en'):'ما نقدم من خدمات'}}</h2></div>
                <div class="services-content wow fadeInUp">
                    <div class="site-tabs-wrap">
                        <div class="site-tabs-aside">
                            <div class="site-tabs-head-mobile"><span>{{ $locale=='en'?GoogleTranslate::trans($services[0]->name, 'en'):$services[0]->name }}</span>
                                <img src="{{asset('assets/images/icons/down-arrow-black.png')}}" alt="">
                            </div>
                            <div class="site-tabs-keys-wrap">
                                <ul>
                                    @foreach ($services as $service )
                                    <li class="site-tab-key @if($services[0]->id==$service->id)active @endif" related-tab="item{{$service->id}}">
                                        <span>{{ $locale=='en'?GoogleTranslate::trans($service->name, 'en'):$service->name}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="site-tabs-content">
                            @foreach ($services as $service )
                                <div class="site-tabs-item item{{$service->id}}">
                                    <div class="services-item">
                                        <div class="services-item-data">
                                            <strong>{{$locale=='en'?GoogleTranslate::trans($service->name, 'en'):$service->name}}</strong>
                                            <p>{!! $service->description && $locale=='en'?GoogleTranslate::trans($service->description, 'en'):$service->description !!}</p>
                                            <a class="normal-btn" href="{{ route('service.index').'?service='.$service->name }}"> {{$locale=='en'?GoogleTranslate::trans('المزيد', 'en'):'المزيد'}}</a>
                                        </div>
                                        <div class="services-item-img-wrap">
                                            <div class="services-item-img">
                                                <img class="fit-image" src="{{isset($service->cover)?$service->cover->getUrl():asset('assets/images/default_image.png')}}" alt="">
                                            </div>
                                            <a class="site-btn primary" href="{{route('service.index')}}">{{$locale=='en'?GoogleTranslate::trans('كل خدماتنا ', 'en'):'كل خدماتنا '}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="featured-books" style="background-image: url({{asset('assets/images/banner/banner1.jpg')}})">
        <div class="featured-books-layer"></div>
        <div class="featured-books-wrap sectionPad">
            <div class="featured-books-item">
                <div class="featured-books-img wow fadeInUp">
                    <img class="fit-image" src="{{$book->l_img?: ($book->s_img?:($book->cover?$book->cover->getUrl():asset('assets/images/default_book.png')))}}" alt="">
                </div>
                <div class="featured-books-data wow fadeInUp"><strong>{{$locale=='en'?GoogleTranslate::trans('أحدث اصداراتنا ', $locale):'أحدث اصداراتنا'}}</strong>
                    <h3> {{ $book->item_name }}  </h3>
                    <p>{{$locale=='en'?GoogleTranslate::trans('متوافر بالمكتبات المسيحية، وبمكتبنا بشبرا، بالطبع', $locale):'متوافر بالمكتبات المسيحية، وبمكتبنا بشبرا، بالطبع'}}</p>
                    <a class="site-btn" href="{{ route('book.show',$book->slug) }}">
                        {{ $locale=='en'?GoogleTranslate::trans('معرفةالمزيد', $locale):'معرفةالمزيد' }}  </a>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-articles courses-contain">
        <div class="featured-articles-wrap sectionPad">
            <div class="featured-articles-head"><h2 class="section-title wow fadeInUp"> {{$locale=='en'?GoogleTranslate::trans('مواد تعليمية', $locale):'مواد تعليمية'}}</h2>
                @include('pages._partials.custom-navigation')
                <a class="site-btn primary" href="{{route('course.index')}}">{{$locale=='en'?GoogleTranslate::trans('كل المواد تعليمية', $locale):'كل المواد تعليمية'}}</a></div>
            <div class="featured-articles-body">
                <div class="swiper-container courses-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($courses as $course)
                        <div class="swiper-slide wow fadeInUp">
                                @include('pages.courses.partials.item')
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="employees-contain sectionTopPad sectionBotPad">
        <div class="employees-wrap sectionPad">
            <div class="employees-grid">
                <div class="swiper-container employees-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($employees as $employee)
                            @include('pages.employees.partials.item')
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="employees-foot wow fadeInUp">
                <a class="site-btn primary" href="{{ route('about') }}">{{$locale=='en'?GoogleTranslate::trans('كل الخدام', $locale):'كل الخدام'}} </a>
            </div>
        </div>
    </div>
    <div class="featured-articles">
        <div class="featured-articles-wrap sectionPad">
            <div class="featured-articles-head wow fadeInUp">
                <h2 class="section-title">{{$locale=='en'?GoogleTranslate::trans(' المقالات ', $locale):'المقالات'}}</h2>
                <a class="site-btn primary" href="{{ route('article.index') }}">{{$locale=='en'?GoogleTranslate::trans('كل المقالات ', $locale):'كل المقالات'}} </a>
            </div>
            <div class="featured-articles-body">
                @foreach ($articles as $article)
                    @include('pages.articles.partials.item')
                @endforeach
            </div>
        </div>
    </div>
    <div class="hp-contact-contain">
        <div class="hp-contact-wrap sectionPad">
            <a class="hp-contact-item wow fadeInUp" href="{{ route('contact') }}">
                <p>{{$locale=='en'?GoogleTranslate::trans('لنقدم المشورة والتعليم، والحث والتشجيع', $locale):'لنقدم المشورة والتعليم، والحث والتشجيع'}}</p>
                <h2 class="section-title">{{$locale=='en'?GoogleTranslate::trans('إتصل بنا الان', $locale):'إتصل بنا الان'}}</h2>
            </a>
        </div>
    </div>
</section>
@include('layouts.partials.front.footer')

<div id="preloadingContain">
    <div class="preloadingWrap"><img src="{{asset('assets/images/backgrounds/preloader.gif')}}"></div>
</div>

<!-- start: script files -->
<script src="{{asset('assets/scripts/app.min.js')}}"></script>

<script type="text/javascript">

    var url = "{{ route('changeLang') }}";
    $(".changeLang").on( "click", function() {
        window.location.href = url + "?lang=en";
    });

</script>
<!-- end: script files -->
</body>
</html>
