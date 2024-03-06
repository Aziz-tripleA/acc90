@extends('layouts.front')
@section('title','إعلانات')
@section('f-content')
<div class="announcements-contain sectionBotPad">
  <div class="announcements-wrap sectionPad">
    <div class="announcements-grid">
      @foreach ($ads as $announcement)
        <div class="announcements-item wow fadeInUp">
          <div class="announcements-item-head">
            <div class="announcements-head-icon">
              <img src="{{ asset('assets/images/icons/promotion.png') }}" alt="" />
            </div>
            <div class="announcements-head-data">
              <span>{{ArabicDate($announcement->date)}}</span><strong>{{$announcement->title}}</strong>
            </div>
          </div>
          <div class="announcements-item-body">
            <p >
              {!! strip_tags(substr($announcement->description, 0, 150)) !!} ...            
            </p>

            <a style="margin-top: 20px" class="site-btn primary" href="{{ route('ads.show',$announcement->id) }}">معرفة المزيد</a>

          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>  
@endsection
