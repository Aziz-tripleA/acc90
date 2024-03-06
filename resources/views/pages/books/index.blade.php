@extends('layouts.front')
@section('title','الكتب')
@section('f-content')
    <div class="main-tabs-contain">
      <div class="main-tabs-wrap sectionPad">
        <ul class="main-tabs-list">
            @foreach ($types as $type)
               <li class="main-tab-item">
                    <a class="main-tab-link @if (($type->id == 1 && !request('type')) || ($type->type_name == request('type') )) active @endif" href="{{ route('book.index',['type'=> $type->type_name]) }}">{{ $type->type_name }}</a>
                </li>
            @endforeach 
        </ul>
      </div>
    </div>
    <div class="product-listing-contain sectionBotPad">
      <div class="product-listing-wrap sectionPad">
        <div class="product-side-filter">
          <div
            class="product-side-filter-head modal-open-key"
            related-modal="filter-modal">
            <strong>تصفية البحث </strong>
            <img src="{{ asset('assets/images/icons/play-arrow-small.png') }}" alt="" />
          </div>
          <div class="product-side-filter-body filter-modal">
            <div class="filter-list-head">
              <strong>تصفية البحث </strong>
              <img
                class="close-modal"
                src="{{ asset('assets/images/icons/close-black.png') }}"
                alt=""
                related-modal="filter-modal"/>
            </div>
            <form action="{{route('book.index')}}">
              <input type="hidden" name="type" value="@if (request('type')) {{request('type')}} @else {{$types[0]->type_name}} @endif"/>
              <ul class="filter-list">
                <li class="filter-list-item">
                  <strong class="filter-list-item-title">المؤلف</strong>
                  <div class="form-group">
                    <div class="form-select">
                      <select class="form-input" name="author_name" onchange="this.form.submit()">
                          <option value="all">كل المؤلفون</option>
                          @foreach ($authors as $author)
                              <option value="{{ $author->author_name }}" @if ($author->author_name == request('author_name')) selected
                                
                              @endif>{{ $author->author_name }}</option>
                          @endforeach
                      </select>
                      <img
                        class="input-floating-icon"
                        src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                        alt=""
                      />
                    </div>
                  </div>
                </li>
                <li class="filter-list-item">
                  <strong class="filter-list-item-title">الموضوع</strong>
                  <div class="form-group">
                    <div class="form-select">
                      <select class="form-input" name="cat_name" onchange="this.form.submit()">
                        <option value="all">كل المواضيع</option>
                        @foreach ($categories as $cat)
                          <option value="{{ $cat->cat_name }}" @if ($cat->cat_name == request('cat_name')) selected
                                
                            @endif>{{ $cat->cat_name }}</option>
                        @endforeach
                      </select>
                      <img
                        class="input-floating-icon"
                        src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                        alt=""
                      />
                    </div>
                  </div>
                </li>
                <li class="filter-list-item">
                  <strong class="filter-list-item-title">الناشر</strong>
                  <div class="form-group">
                    <div class="form-select">
                      <select class="form-input" name="publish_name" onchange="this.form.submit()">
                        <option value="all">كل الناشرين</option>
                        @foreach ($publishers as $publisher)
                          <option value="{{ $publisher->publish_name }}" @if ($publisher->publish_name == request('publish_name')) selected
                                
                            @endif>{{ $publisher->publish_name }}</option>
                        @endforeach
                      </select>
                      <img
                        class="input-floating-icon"
                        src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                        alt=""
                      />
                    </div>
                  </div>
                </li>
                <li class="filter-list-item">
                  <strong class="filter-list-item-title">المترجم</strong>
                  <div class="form-group">
                    <div class="form-select">
                      <select class="form-input" name="translator_name" onchange="this.form.submit()">
                        <option value="all">كل المترجمين</option>
                        @foreach ($translators as $translator)
                          <option value="{{ $translator->translator_name }}" @if ($translator->translator_name == request('translator_name')) selected
                                
                            @endif>{{ $translator->translator_name }}</option>
                        @endforeach
                      </select>
                      <img
                        class="input-floating-icon"
                        src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                        alt=""
                      />
                    </div>
                  </div>
                </li>
              </ul>
            </form>
          </div>
        </div>
        <div class="product-result">
          <div class="product-result-body">
            <div class="main-search-form">
              <form action="{{route('book.index')}}">
                <input type="hidden" name="type" value="@if (request('type')) {{request('type')}} @else {{$types[0]->type_name}} @endif"/>

                <div class="form-group">
                  <input
                    class="form-input"
                    type="text"
                    placeholder="بحث …"
                    name="q"
                    value="{{request('q')}}"
                  />
                  <button class="search-btn" type="submit">
                    <img src="{{ asset('assets/images/icons/search-colored.png') }}" alt="" />
                  </button>
                </div>
              </form>
            </div>
            @if (!$books->count())
                  @include('pages._partials.no-listing-data')
            @else
              <div class="books-listing-body">
                @foreach ($books as $book)
                   @include('pages.books.partials.item')
                @endforeach
              </div>
            @endif

          </div>
          @include('layouts.partials.front.pagination',['collection'=>$books])
        </div>
      </div>
    </div>
  
@endsection
