@extends('layouts.front')
@section('title','اتصل بنا')
@section('f-content')
<div class="contact-details sectionBotPad">
    <div class="contact-details-wrap sectionPad">
      <div class="contact-map wow fadeInUp">
        <div class="google-map">
          <iframe
            src="{{ $map }}"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy">
          </iframe>
        </div>
      </div>
      <div class="contact-form wow fadeInUp">
        <strong>طرق التواصل</strong>
        <ul class="contact-list">
            @foreach ($contacts as $contact)
                <li>
                    <strong>{{ $contact->title }}</strong>
                    @if ($contact->order == 3)
                        <a dir="ltr" href="tel:{{$contact->value}}" target="_top">{{$contact->value}}</a>
                    @elseif ($contact->order == 4)
                        <a dir="ltr" href="https://wa.me/{{$contact->value}}" target="_blank">{{$contact->value}}</a>
                    @else
                      <span>{{ $contact->value }}</span>
                    @endif
                </li>
            @endforeach
          <li>
            <strong>تابعونا علي</strong>
            <div class="social-media-wrap">
              <ul>
                @include('pages._partials.social-links',['color'=>'colored'])
             
              </ul>
            </div>
          </li>
        </ul>
        <a class="site-btn primary" href="{{route('askhelp.create')}}">طلب مشورة شخصية
        </a>
      </div>
    </div>
  </div>
@endsection