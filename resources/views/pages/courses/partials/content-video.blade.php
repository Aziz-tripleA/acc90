<div class="dynamic-data-wrap wow fadeInUp">
    {!! $course->content !!}
</div>
<div class="video-section wow fadeInUp" style="padding: 0px;" >
    <div class="video-wrap">
        {{ video($course->video_url) }}
        {{-- <a class="video-btn" href="#">
            <div class="video-btn-icon">
                <img src="{{ asset('assets/images/icons/play-btn-arrow-black.png')}}" alt="" />
            </div>
            <span>شاهد الان</span>
        </a> --}}
    </div>
</div>