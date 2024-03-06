<a class="courses-item wow fadeInUp" href="{{ route('course.show',$course->slug) }}">
    <div class="courses-item-img">
        <img
            class="fit-image"
            src="{{asset($course->cover?$course->cover->getUrl():asset('assets/images/default_image.png'))}}"
            alt=""
        />
    </div>
    <div class="courses-item-data">
        <div class="courses-item-data-body">
            <span>{{($course->topic&&$course->topic->name)?($locale=='en'? GoogleTranslate::trans($course->topic->name, $locale):$course->topic->name):''}}</span>
            <h3>{{ $locale=='en'?GoogleTranslate::trans($course->title, $locale):$course->title }}</h3>
            <strong>{{ ($course->lecturer&&$course->lecturer->name)?($locale=='en'? GoogleTranslate::trans($course->lecturer->name, $locale):$course->lecturer->name):''}}</strong>
        </div>
        <div class="courses-item-data-foot">
            <div class="icon-wrap">
                @php
                    $icon = $course->type=="text"?"google-docs.png":($course->type=="video"?"play-button-white.png":"volume-white.png");
                @endphp
                <img src="{{asset('assets/images/icons/'.$icon)}}" alt="" />
                <span>{{ $course->type=='text'? GoogleTranslate::trans('محاضرة مقرؤة', $locale?:'ar') :($course->type=='video'? GoogleTranslate::trans('محاضرة فيديو', $locale?:'ar') : GoogleTranslate::trans('محاضرة مسموعة', $locale?:'ar') ) }}</span>
            </div>
            <div class="courses-item-date">
                <span> {{ $course->date? ArabicDate($course->date):ArabicDate($course->created_at)}} </span>
            </div>
        </div>
    </div>
</a>