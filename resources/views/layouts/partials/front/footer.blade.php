<footer class="footer-contain">
    <div class="footer-wrap">
      <div class="footer-top sectionPad">
        <div class="footer-item">
          <img src="{{ asset('assets/images/icons/logo-white.png') }}" alt="" />
          <p>{{$locale=='en'?GoogleTranslate::trans('خدمة المشورة والنضج المسيحي" هي خدمة مسيحية مجانية لا طائفية تعمل
            تحت مظلة رابطة الإنجيليين بمصر', $locale):'خدمة المشورة والنضج المسيحي" هي خدمة مسيحية مجانية لا طائفية تعمل
            تحت مظلة رابطة الإنجيليين بمصر'}} 
          </p>
          <div class="footer-social">
            <div class="social-media-wrap">
              <ul>
                @include('pages._partials.social-links',['color'=>'white'])
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-item footer-nav-item">
          <div class="footer-nav-list">
            <strong>{{$locale=='en'?GoogleTranslate::trans('تعرف علينا', 'en'):'تعرف علينا'}}</strong>
            <div class="footer-nav-extra-list">
              <ul>
                <li><a href="{{ route('about') }}">{{$locale=='en'?GoogleTranslate::trans('من نحن ', $locale):'من نحن '}}</a></li>
                <li><a href="{{ route('service.index') }}">{{$locale=='en'?GoogleTranslate::trans('خدماتنا', $locale):'خدماتنا'}}</a></li>
                <li><a href="{{ route('testimonial.index') }}">{{$locale=='en'?GoogleTranslate::trans('اختبارات', $locale):'اختبارات'}}</a></li>
              </ul>
              <ul>
                <li><a href="{{ route('book.index',['type'=>'اصداراتنا']) }}"> {{$locale=='en'?GoogleTranslate::trans('المكتبة', $locale):'المكتبة'}}</a></li>
                <li><a href="{{route('article.index') }}">{{$locale=='en'?GoogleTranslate::trans('مقالات', $locale):'مقالات'}}</a></li>
                <li><a href="{{ route('ads.index') }}">{{$locale=='en'?GoogleTranslate::trans('إعلانات', $locale):'إعلانات'}}</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-item footer-nav-item">
          <div class="footer-nav-list">
            <strong>{{$locale=='en'?GoogleTranslate::trans('مواد تعليمية ', $locale):'مواد تعليمية'}}</strong>
            <ul>
              @foreach ($coursesTopics as $topic)
                <li><a href="{{route('course.index',['topic'=>$topic->title])}}"> {{$topic->title&&$locale=='en'?GoogleTranslate::trans($topic->title, $locale):$topic->title}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="footer-item">
          <div class="footer-nav-list">
            <strong>{{$locale=='en'?GoogleTranslate::trans('لدعم الخدمة ', $locale):'لدعم الخدمة'}}</strong>
            <p>{{$locale=='en'?GoogleTranslate::trans('إذا أردت المساهمة بتبرع أو تعهد شهري للمشاركة في نفقات الخدمة
              التي نقدمها مجاناً 100% للمخدومين', $locale):'إذا أردت المساهمة بتبرع أو تعهد شهري للمشاركة في نفقات الخدمة
              التي نقدمها مجاناً 100% للمخدومين'}}
              
            </p>
            <a class="border-btn" href="{{route('donate')}}">{{$locale=='en'?GoogleTranslate::trans('ادعم الخدمة الان', $locale):'ادعم الخدمة الان'}} </a>
          </div>
        </div>
      </div>
      <div class="footer-bot sectionPad">
        <div class="footer-copy-rights">
          <p>© Copyright {{ now()->year }} {{config('app.name')}}. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>