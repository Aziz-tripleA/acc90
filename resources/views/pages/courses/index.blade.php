@extends('layouts.front')
@section('title','مواد تعليمية')
@section('f-content')

<div class="product-listing-contain sectionBotPad">

    <div class="sectionPad">
      <div class="product-result-body">
        <form action="{{route('course.index')}}">
          <ul class="main-filter-list">
            <li class="main-filter-item">
              <div class="form-group">
                <label class="form-label">الموضوع</label>
                <div class="form-select">
                  <select class="form-input" name="topic" onchange="this.form.submit()">
                    <option value="all">كل المواضيع</option>
                    @foreach ($topics as $topic)
                        <option value="{{ $topic->title }}" @if ($topic->title == request('topic')) selected
                                
                            @endif>{{ $topic->title }}</option>
                    @endforeach
                  </select>
                  <img
                    class="input-floating-icon"
                    src="{{ asset('assets/images/icons/down-arrow-black.png')}}"
                    alt=""/>
                </div>
              </div>
            </li>
            <li class="main-filter-item">
              <div class="form-group">
                <label class="form-label">المحاضرين</label>
                <div class="form-select">
                  <select class="form-input" name="lecturer" onchange="this.form.submit()">
                    <option value="all">كل المحاضرين</option>
                    @foreach ($lecturers as $lecturer)
                        <option value="{{ $lecturer->name }}" @if ($lecturer->name == request('lecturer')) selected                               
                            @endif>{{ $lecturer->name }}</option>
                    @endforeach
                  </select>
                  <img
                    class="input-floating-icon"
                    src="{{ asset('assets/images/icons/down-arrow-black.png')}}"
                    alt=""/>
                </div>
              </div>
            </li>
            <li class="main-filter-item">
              <div class="form-group">
                <label class="form-label">وسائط العرض</label>
                <div class="form-select">
                  <select class="form-input" name="type" onchange="this.form.submit()">
                    <option value="all">كل الوسائط</option>
                    <option value="text" @if ('text' == request('type')) selected @endif>محاضرة مقروءة</option>
                    <option value="audio" @if ('audio' == request('type')) selected @endif>محاضرة مسموعة</option>
                    <option value="video" @if ('video' == request('type')) selected @endif>محاضرة فيديو</option>
                  </select>
                  <img
                    class="input-floating-icon"
                    src="{{ asset('assets/images/icons/down-arrow-black.png')}}"
                    alt=""/>
                </div>
              </div>
            </li>
          </ul>
        </form>
        <div class="courses-listing-body">
            @foreach ($courses as $course)
                @include('pages.courses.partials.item')
            @endforeach  
        </div>
      </div>
      @include('layouts.partials.front.pagination',['collection'=>$courses])
    </div>
</div>
@endsection