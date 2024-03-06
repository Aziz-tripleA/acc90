<div class="dynamic-data-wrap wow fadeInUp">
    {!! $course->content !!}
    @if ($course->getUrlFor('pdf_file'))
        <img src="{{asset('images/stories/pdf-32x32.png')}}" /><a href="{{ $course->getUrlFor('pdf_file') }}" target="_blank">{{ $course->title }}</a>
    @endif
</div>