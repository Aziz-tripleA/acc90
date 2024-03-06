@extends('layouts.front')
@section('title','خدماتنا')

@section('f-content')

@if(sizeOf($services)>0)
  <div class="services-contain single-main sectionBotPad">
    <div class="services-wrap sectionPad">
      <div class="services-content wow fadeInUp">
        <div class="site-tabs-wrap">
          <div class="site-tabs-aside">
            <div class="site-tabs-head-mobile">
              <span>{{$services[0]->name}}</span>
              <img src="{{ asset('assets/images/icons/down-arrow-black.png') }}" alt="" />
            </div>
            <div class="site-tabs-keys-wrap">
              <ul>
                @foreach ($services as $service)
                    <li class="site-tab-key {{(($selected_service) && $selected_service==$service->name)?'active': (!($selected_service) && ($services[0]->id==$service->id)? 'active':'')}}" related-tab="item{{$service->id}}">
                        <span>{{$service->name}}</span>
                    </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="site-tabs-content" >
            @foreach ($services as $service)
                <div class="site-tabs-item item{{$service->id}}" style="display:{{(($selected_service) && $selected_service==$service->name)?'block': (!($selected_service) && ($services[0]->id==$service->id)? 'block':'none')}}">
                    <div class="services-item">
                        <div class="services-item-data">
                            <strong>{{$service->name}}</strong>
                            <p>
                            {!!$service->description!!}
                            </p>
                            @if ($service->button_text)
                            <a class="site-btn primary" href="{{$service->button_link}}">{{$service->button_text}}</a>
                            @endif
                        </div>
                        <div class="services-item-img-wrap">
                            <div class="services-item-img">
                            <img
                                class="fit-image"
                                src="{{ $service->cover?asset($service->cover->getUrl()):asset('assets/images/default_image.png') }}"
                                alt="{{$service->name}}"
                            />
                            </div>
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
  <div class="services-contain single-main single-sub" id="methak">
    <div class="services-wrap sectionPad">
      <div class="section-head wow fadeInUp">
        <div class="section-head-title">
          <ul class="logo-list">
            <li><img src="{{ asset('assets/images/icons/logo-white.png')}}" alt="" /></li>
            <li>
              <span>مبنية حسب </span><br>
              <img style="width: 150px" src="{{asset('assets/images/APA_Psych1.png')}}" alt="American Psychological Association"/>
            </li>
          </ul>
          <h2 class="section-title">الميثاق/القانون الأدبي للخدمة</h2>
        </div>
        <div class="section-head-img">
          <img class="fit-image" src="{{ $values_image }}" alt="" />
        </div>
      </div>
      @if(sizeOf($values)>0)
      <div class="services-content wow fadeInUp">
        <div class="site-tabs-wrap">
          <div class="site-tabs-aside">
            <div class="site-tabs-head-mobile">
              <span>{{$values[0]->name}}</span>
              <img src="{{ asset('assets/images/icons/down-arrow-black.png') }}" alt="" />
            </div>
            <div class="site-tabs-keys-wrap">
              <ul>
                @foreach ($values as $value)
                    <li class="site-tab-key @if($values[0]->id==$value->id)active @endif" related-tab="value{{$value->id}}">
                        <span>{{$value->name}}</span>
                    </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="site-tabs-content">
            @foreach ($values as $value)
                <div class="site-tabs-item value{{$value->id}}">
                    <div class="services-item">
                        <div class="services-item-data">
                        <div class="dynamic-data-wrap">
                            <strong>{{$value->name}}</strong>
                            {!!$value->description!!}
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach   
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
    
@endsection
