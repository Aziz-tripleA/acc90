@extends('layouts.front')
@section('title','المقالات')
@section('f-content')

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
            related-modal="filter-modal"
          />
        </div>
        <form action="{{route('article.index')}}">
          <ul class="filter-list">
            <li class="filter-list-item">
              <ul class="checkbox-list">
                <li class="checkbox-item">
                  <div class="accordion-item">
                    <div class="accordion-head">
                      <span>الموضوع</span>
                      <div class="accordion-arrow">
                        <img
                          class="accordion-arrow-icon"
                          src="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                          alt="icon"
                          activeSrc="{{ asset('assets/images/icons/down-arrow-black.png') }}"
                          nonActiveSrc="{{ asset('assets/images/icons/up-arrow-black.png') }}"
                        />
                      </div>
                    </div>
                    <div class="accordion-body">
                      <ul class="checkbox-list">
                        <li class="checkbox-item">
                          <label class="custom-checkbox">
                            <div class="custom-checkbox-label">
                              <span>كل المواضيع </span>
                            </div>
                            <input type="checkbox" name="topic" value="all" @if ('all '== request('topic')) checked @endif onchange="this.form.submit()"/>
                            <span class="custom-checkmark"></span>
                          </label>
                        </li>
                        @foreach ($topics as $topic)
                          <li class="checkbox-item">
                            <label class="custom-checkbox">
                              <div class="custom-checkbox-label">
                                <span>{{ $topic->title }}</span>
                              </div>
                              <input type="checkbox" name="topics[]" @if ((null !==request('topics')) && (in_array($topic->title , request('topics'))) && 'all' != request('topic')) checked @endif value="{{ $topic->title }}" onchange="this.form.submit()"/>
                              <span class="custom-checkmark"></span>
                            </label>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            <li class="filter-list-item">
              <ul class="checkbox-list">
                <li class="checkbox-item">
                  <div class="accordion-item">
                    <div class="accordion-head">
                      <span>الكاتب</span>
                      <div class="accordion-arrow">
                        <img
                          class="accordion-arrow-icon"
                          src="{{ asset('assets/images/icons/down-arrow-black.png')}}"
                          alt="icon"
                          activeSrc="{{ asset('assets/images/icons/down-arrow-black.png')}}"
                          nonActiveSrc="{{ asset('assets/images/icons/up-arrow-black.png')}}"
                        />
                      </div>
                    </div>
                    <div class="accordion-body">
                      <ul class="checkbox-list">
                        <li class="checkbox-item">
                          <label class="custom-checkbox">
                            <div class="custom-checkbox-label">
                              <span>كل الكتاب </span>
                            </div>
                            <input type="checkbox" name="writer" value="all" @if ('all' == request('writer')) checked @endif onchange="this.form.submit()"/>
                            <span class="custom-checkmark"></span>
                        </label>
                        </li>
                        @foreach ($writers as $writer)   
                          <li class="checkbox-item">
                            <label class="custom-checkbox">
                              <div class="custom-checkbox-label">
                                <span>{{ $writer->name }}</span>
                              </div>
                              <input type="checkbox" name="writers[]" value="{{ $writer->name }}" @if (null !==request('writers') && in_array($writer->name , request('writers')) && 'all' != request('writer')) checked @endif onchange="this.form.submit()"/>
                              <span class="custom-checkmark"></span>
                            </label>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </form>
      </div>
    </div>
    @if (!$articles->count())
      @include('pages._partials.no-listing-data')
    @else
      <div class="product-result">
        <div class="product-result-body">
          <div class="news-listing-body">
            @foreach ($articles as $article)
              @include('pages.articles.partials.item') 
            @endforeach
          </div>
        </div>
        @include('layouts.partials.front.pagination',['collection'=>$articles])
      </div>
    @endif
  </div>
</div>
    
  
@endsection
