@extends('layouts.front')
@section('title',$book->item_name)
@section('meta')
  <meta name="description" content="{{isset($book)?$book->item_name:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta property="type" content="website"/>
  <meta property="url" content="{{request()->fullUrl()}}"/>
  <link rel="canonical" href="{{ URL::current() }}">
  {{-- <meta property="fb:app_id" content="1413929195661830"/> --}}
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:title" content="{{$book->item_name}}"/>
  <meta name="twitter:description" content="{{isset($book)?$book->item_name:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta name="twitter:image" content="{{isset($book) && $book->cover ? asset($book->getUrlFor('cover')) : asset('assets/images/default_image.png')}}"/>
  <meta property="og:title" content="{{$book->item_name}}">
  <meta property="og:description" content="{{isset($book)?$book->item_name:'لنقدم المشورة والتعليم، والحث والتشجيع'}}"/>
  <meta property="og:image" content="{{isset($book)&& $book->cover ? asset($book->getUrlFor('cover')) : asset('assets/images/default_image.png')}}">
  <meta property="og:image:url" content="{{isset($book) && $book->cover ? asset($book->getUrlFor('cover')) : asset('assets/images/default_image.png')}}"/>
  <meta property="og:image:secure_url" content="{{isset($book) && $book->cover ? asset($book->getUrlFor('cover')) : asset('assets/images/default_image.png')}}"/>
@endsection
@section('f-content')

    <div class="books-single-contains sectionBotPad">
      <div class="books-single-wrap sectionPad">
        <div class="books-single-content">
          <div class="books-single-img">
            <div class="book-item">
              <div class="book-item-img wow fadeInUp">
                <img style="height:399px;width:300px" src="{{ $book->l_img?: ($book->s_img?:($book->cover?$book->cover->getUrl():asset('assets/images/default_book.png')))}}" alt="{{ $book->item_name }}" />
              </div>
              <div class="book-item-data wow fadeInUp">
                <div class="book-item-content" >
                  <ul>
                    <li>
                      <strong>اسم المؤلف </strong><span>{{ $book->author?$book->author->author_name:'' }}</span>
                    </li>
                    <li>
                      <strong>الناشر </strong>
                      <span>{{ $book->publisher?$book->publisher->publish_name:'' }}</span>
                    </li>
                    <li>
                      <strong>التصنيف </strong><span>{{ $book->category?$book->category->cat_name:'' }}</span>
                    </li>
                    <li>
                      <strong>كود الاستعارة  </strong><span>{{ $book->item_code }} </span>
                    </li>
                  </ul>
                </div>
              </div>
                <a class="order-btn wow fadeInUp" href="https://wa.me/+201227708916" target="_blank"> طلب الكتاب </a>
            </div>
              <div class="books-single-body" style="width: 100%;padding-top:30px">
                  <div class="dynamic-data-wrap wow fadeInUp">
                      {!! nl2br($book->book_details) !!}
                      <br>
                      {!! nl2br($book->book_index) !!}
                  </div>
              </div>
            @if ($book->type->type_name == 'اصداراتنا')
              {{-- <a class="order-btn wow fadeInUp" href="#"> طلب الكتاب </a> --}}
            @endif
          </div>

        </div>
        <div class="related-books">
          <div class="section-head wow fadeInUp">
            <h2 class="section-title">المزيد من الكتب في نفس التصنيف</h2>
          </div>
          <div class="related-books-body">
            <div class="related-books-listing-body">
              @foreach ($related_books as $book)
                @include('pages.books.partials.item')
              @endforeach
            </div>
          </div>
        </div>
        @if(sizeof($small_books)>0)
          <div class="related-books">
            <div class="section-head wow fadeInUp">
              <h2 class="section-title">كتب تم تلخيصها</h2>
            </div>
            <div class="related-books-body">
              <div class="related-books-listing-body">
                @foreach ($small_books as $book)
                  @include('pages.books.partials.item')
                @endforeach
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
@endsection
