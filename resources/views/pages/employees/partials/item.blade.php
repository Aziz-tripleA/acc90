<div class="swiper-slide wow fadeInUp">
    <div class="employees-item employees-grid">
      <div class="employees-item-img-wrap">
        <div class="employees-item-img">
          <img class="fit-image" src="{{ $employee->cover?$employee->cover->getUrl():asset('assets/images/default_image.png') }}" alt="{{ $employee->name }}" />
        </div>
      </div>
      <div class="employees-item-data-wrap">
        <p>{{ $locale == 'en'?GoogleTranslate::trans('خدام المكتب', $locale):'خدام المكتب' }}</p>
        <strong>{{ $employee->name&&$locale == 'en'? GoogleTranslate::trans($employee->name, $locale):$employee->name }}</strong>
        <p>{{ $employee->position&&$locale == 'en'? GoogleTranslate::trans($employee->position, $locale):$employee->position }}</p>
        <span>{!! $employee->bio&&$locale == 'en'? GoogleTranslate::trans($employee->bio, $locale):$employee->bio !!}</span>
        @include('pages._partials.custom-navigation',['color'=>'white'])
      </div>
    </div>
    @if(request()->is('*about*'))
    <div class="employees-foot wow fadeInUp">
      <div class="dynamic-data-wrap">
        {!! nl2br($employee->description) !!}
      </div>
    </div>
    @endif
  </div>