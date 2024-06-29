@extends('layouts.front')
@section('title', 'من نحن')

@section('f-content')
    <div class="about-intro-contain">
        <div class="about-intro-wrap sectionPad">
            <div class="about-intro-item wow fadeInUp">
                <h2 class="section-title">
                    {{ isset($about) ? $about->first_section_title : 'لنقدم المشورة والتعليم، والحث والتشجيع' }}
                </h2>
                <strong>
                    {{ isset($about) ? $about->first_section_subtitle : 'في كل حكمة ممكنة, لكي نحضر كل إنسان ناضجاً في المسيح يسوع' }}</strong>
            </div>
            <div class="about-intro-item wow fadeInUp">
                {!! isset($about) ? $about->first_section_text : '' !!}
            </div>
        </div>
    </div>
    <div class="about-contain">
        <div class="about-wrap sectionPad">
            <div class="about-data wow fadeInUp">
                <h3>{{ isset($about) ? $about->second_section_title : '' }}</h3>
                {!! isset($about) ? $about->second_section_text : '' !!}
                <ul class="counter-list">
                    @foreach ($abuses as $abuse)
                        <li>
                            <span>يتعرض</span>
                            <strong>{{ $abuse->number }}</strong>
                            <span>{{ $abuse->title }}</span>
                            <p>{!! $abuse->text !!}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="about-img wow fadeInUp">
                <img class="fit-image"
                    src="{{ isset($about) && $about->getUrlFor('first_image') ? $about->getUrlFor('first_image') : asset('assets/images/default_image.png') }}"
                    alt="" />
            </div>
        </div>
    </div>
    <div class="counter-contain sectionTopPad sectionBotPad">
        <div class="counter-wrap sectionPad">
            <ul class="counter-list">
                @foreach ($numbers as $number)
                    <li class="wow fadeInUp">
                        <strong>{{ $number->number }}</strong>
                        <span>{{ $number->title }}</span>
                        <p>{!! $number->text !!}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="video-section" style="background-image: url({{ isset($about) && $about->getUrlFor('second_image') ? $about->getUrlFor('second_image') : asset('assets/images/default_image.png') }})">
        <div class="video-iframe">
            {{video($about->third_section_video_url)}}
        </div>
        <div class="video-wrap sectionPad wow fadeInUp">
            <strong>{{ isset($about) ? $about->third_section_title : '' }}</strong>
            <a class="video-btn" href="#">
                <div class="video-btn-icon"> <img src="{{ asset('assets/images/icons/play-btn-arrow-black.png') }}" alt=""></div>
                <span>شاهد الان</span>
            </a>
        </div>
    </div>
    <div class="download-service">
        <div class="download-service-wrap sectionPad">
            <a class="download-service-btn wow fadeInUp" download href="{{ isset($about) & isset($about->pdf_file) ? $about->pdf_file->getUrl():'' }}">
                <div class="download-service-icon">
                    <img src="{{ asset('assets/images/icons/pdf-green.png') }}" alt="" />
                </div>
                <strong>{{ isset($about) ? $about->fourth_section_title : '' }}</strong>
            </a>
        </div>
    </div>
    <div class="gloals-contain sectionTopPad sectionBotPad" id="goals">
        <div class="gloals-wrap sectionPad">
            <div class="goals-data wow fadeInUp">
                <h2 class="section-title">{{ isset($about) ? $about->fifth_section_title : '' }}</h2>
                {!! isset($about) ? $about->fifth_section_text : '' !!}
            </div>
        </div>
    </div>
    <div class="values-contain">
        <div class="values-wrap sectionPad">
            <div class="values-swiper swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($perposes as $key => $perpos)
                        <div class="swiper-slide">
                            <div class="values-item">
                                <div class="values-item-img wow fadeInUp">
                                    <img class="fit-image" src="{{ $perpos->cover->getUrl() }}"
                                        alt="{{ $perpos->title }}" />
                                </div>
                                <div class="values-item-data wow fadeInUp">
                                    <h2 class="section-title">{{ isset($about) ? $about->sixth_section_title : '' }}</h2>
                                    <div class="values-item-content">
                                        <div class="values-item-content-numb"><span>{{ $key + 1 }}</span></div>
                                        <div class="values-item-content-text">
                                            <div class="dynamic-data-wrap">
                                                <strong>{{ $perpos->title }}</strong>
                                                <p>
                                                    {!! $perpos->text !!}
                                                </p>
                                                {{-- <div class="custom-navigation-wrap">
                                                    <div class="custom-navigation">
                                                        <div class="custom-btn swiper-button-prev">
                                                            <div class="custom-btn-icon">
                                                              <img src="{{asset('assets/images/icons/btn-arrow-prev-white.png')}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="custom-btn swiper-button-next">
                                                            <div class="custom-btn-icon"><img
                                                                    src="{{asset('assets/images/icons/btn-arrow-next-white.png')}}"
                                                                    alt=""></div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                @include('pages._partials.custom-navigation',['color'=>'white'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="servants" class="employees-contain single sectionTopPad sectionBotPad" style="padding-bottom: 0px">
        <div class="employees-wrap sectionPad">
            <div class="">
                <div class="swiper-container employees-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($employees as $employee)
                            @include('pages.employees.partials.item')
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="support-link">
        <div class="support-link-wrap sectionPad wow fadeInUp">
            <strong>جميع خدمات المكتب تُقدم مجانية، وتعتمد موارد الخدمة تماماً على
                التبرعات</strong>
            <a class="border-btn" href="{{ route('donate') }}">لدعم الخدمة </a>
        </div>
    </div>
@endsection
