<a class="news-item wow fadeInUp" target="_blank" href="{{ route('article.show',$article->slug) }}">
    <div class="news-item-img">
      <img
        class="fit-image"
        src="{{ asset($article->cover?$article->cover->getUrl():asset('assets/images/default_image.png')) }}"
        alt="image"
      />
    </div>
    <div class="news-item-data">
      <h3 class="news-title">"{{$article->title&&$locale=='en'?GoogleTranslate::trans($article->title, $locale):$article->title}}"</h3>
      <p class="writer"> {{$locale=='en'?GoogleTranslate::trans('كتابة', $locale):'كتابة'}}/ {{($article->writer&&$article->writer->name)?($locale=='en'?GoogleTranslate::trans($article->writer->name, $locale):$article->writer->name):''}}</p>
      <p class="date">{{ !is_null( $article->date)?ArabicDate($article->date):ArabicDate($article->created_at) }}</p>
    </div>
  </a>