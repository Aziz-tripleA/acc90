<header class="header-contain activeScroll">
    <div class="header-wrap sectionPad">
        <div class="header-top-wrap">
            <div class="header-logo-wrap">
                <div class="header-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/icons/logo-white.png') }}" alt=""/>
                    </a>
                </div>
            </div>
            <ul class="header-nav-list">
                <li class="header-nav-item">
                    <a href="{{ route('about') }}">{{$locale=='en'?GoogleTranslate::trans('من نحن ', $locale):'من نحن'}}</a>
                </li>
                <li class="header-nav-item">
                    <a href="{{ route('service.index') }}"> {{$locale=='en'?GoogleTranslate::trans('خدماتنا', $locale):'خدماتنا'}}</a>
                    <ul>
                        @foreach ($services as $service)
                            <li>
                                <a href="{{ route('service.index',['service'=>$service->name]) }}">{{$locale=='en'?GoogleTranslate::trans($service->name, $locale):$service->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="header-nav-item">
                    <a href="{{ route('book.index',['type'=>'اصداراتنا']) }}"> {{$locale=='en'?GoogleTranslate::trans('المكتبة', $locale):'المكتبة'}}</a>
                </li>
                <li class="header-nav-item">
                    <a href="{{ route('article.index') }}"> {{$locale=='en'?GoogleTranslate::trans('مقالات', $locale):'مقالات'}}</a>
                </li>
                <li class="header-nav-item">
                    <a href="{{ route('course.index') }}">{{$locale=='en'?GoogleTranslate::trans('مواد تعليمية ', $locale):'مواد تعليمية '}}</a>
                </li>
                <li class="header-nav-item">
                    <a href="{{ route('testimonial.index') }}"> {{$locale=='en'?GoogleTranslate::trans('اختبارات', $locale):'اختبارات'}}</a>
                </li>
                <li class="header-nav-item">
                    <a href="{{ route('ads.index') }}"> {{$locale=='en'?GoogleTranslate::trans('إعلانات', $locale):'إعلانات'}}</a>
                </li>
                <li class="header-nav-item">
                    <a href="{{ route('contact') }}">{{$locale=='en'?GoogleTranslate::trans('اتصل بنا', $locale):'اتصل بنا'}}</a>
                </li>
                <li class="header-nav-item">
                    <a href="{{ route('search.show') }}" >
                        <div >
                            <img src="{{ asset('assets/images/icons/search.png') }}" alt="" width="18"/>
                        </div>
                    </a>
                </li>
                <li class="header-nav-item">
                    <a class="border-btn"
                       href="{{ route('askhelp.create') }}"> {{$locale=='en'?GoogleTranslate::trans('طلب مشورة شخصية ', $locale):'طلب مشورة شخصية'}}</a>
                </li>
                <li class="header-nav-item">
                    <a class="border-btn"
                       href="{{ route('donate') }}"> {{$locale=='en'?GoogleTranslate::trans('لدعم الخدمه', $locale):'لدعم الخدمه'}}</a>
                </li>
            </ul>
            <ul class="header-extra-links">
                <li>
                    <div class="header-search-key">
                    <a href="{{ route('search.show') }}" >
                        <div >
                            <img src="{{ asset('assets/images/icons/search.png') }}" alt="" width="18"/>
                        </div>
                    </a>
                    </div>
                </li>
                <li><a class="border-btn"
                       href="{{ route('donate') }}"> {{$locale=='en'?GoogleTranslate::trans('لدعم الخدمه', $locale):'لدعم الخدمه'}}</a>
                </li>
                <li>
                    <div class="header-menu">
                        <div class="menu-icon">
                            <div class="menu-icon-line"></div>
                            <div class="menu-icon-line"></div>
                            <div class="menu-icon-line"></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="header-search">
    <div class="header-search-content">

        <div class="header-search-key">
        <a href="{{ route('search.show') }}" >
                        <div >
                            <img src="{{ asset('assets/images/icons/search.png') }}" alt="" width="18"/>
                        </div>
                    </a>
        </div>
    </div>
    <div class="product-listing-contain sectionBotPad">
        <div class="product-listing-wrap sectionPad">

        </div>
    </div>
</div>
<div class="megamenu-contain">
    <div class="megamenu-wrap">
        <div class="megamenu-body">
            <div class="megamenu-links">
                <div class="megamenu-head">
                    <div class="menu-icon megamenu-toggle-link">
                        <img src="{{ asset('assets/images/icons/close-black.png') }}" alt="icon"/>
                    </div>
                </div>
                <div class="megamenu-nav">
                    <ul>
                        <li>
                            <a href="{{ route('about') }}">{{$locale=='en'?GoogleTranslate::trans('من نحن ', $locale):'من نحن '}}</a>
                        </li>
                        <li>
                            <a href="{{ route('service.index') }}"> {{$locale=='en'?GoogleTranslate::trans('خدماتنا', $locale):'خدماتنا'}}</a>
                        </li>
                        <li>
                            <a href="{{ route('book.index',['type'=>'اصداراتنا']) }}"> {{$locale=='en'?GoogleTranslate::trans('المكتبة', $locale):'المكتبة'}}</a>
                        </li>
                        <li>
                            <a href="{{ route('article.index') }}"> {{$locale=='en'?GoogleTranslate::trans('مقالات', $locale):'مقالات'}}</a>
                        </li>
                        <li>
                            <a href="{{ route('course.index') }}">{{$locale=='en'?GoogleTranslate::trans('مواد تعليمية ', $locale):'مواد تعليمية '}}</a>
                        </li>
                        <li>
                            <a href="{{ route('testimonial.index') }}"> {{$locale=='en'?GoogleTranslate::trans('اختبارات', $locale):'اختبارات'}}</a>
                        </li>
                        <li>
                            <a href="{{ route('ads.index') }}"> {{$locale=='en'?GoogleTranslate::trans('إعلانات', $locale):'إعلانات'}}</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">{{$locale=='en'?GoogleTranslate::trans('اتصل بنا ', $locale):'اتصل بنا'}}</a>
                        </li>
                        <li>
                            <a class="border-btn"
                               href="{{ route('donate') }}"> {{$locale=='en'?GoogleTranslate::trans('لدعم الخدمه', $locale):'لدعم الخدمه'}}</a>
                        </li>
                        <li>
                            <a class="border-btn"
                               href="{{ route('askhelp.create') }}"> {{$locale=='en'?GoogleTranslate::trans('طلب مشورة شخصية ', $locale):'طلب مشورة شخصية'}}</a>
                        </li>
                    </ul>
                </div>
                <div class="megamenu-foot">
                    <div class="social-media-wrap">
                        <ul>
                            @include('pages._partials.social-links',['color'=>'white'])
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#search-form').on('submit', function (e) {
            e.preventDefault();
            var query = $('#search-input').val();
            var csrfToken = "{{ csrf_token() }}";
            $.ajax({
                type: 'POST',
                url: '/search',
                data: {_token: csrfToken, query: query},
                success: function (data) {
                    $('#search-results').html(data.html)

                    if (data.pagination.has_more_pages) {
                        $('#load-more').data('page', data.pagination.current_page + 1);
                    } else {
                        $('#pagination-links').remove();
                    }
                }
            });
        });
    });
    $(document).on('click', '#load-more', function (e) {
        e.preventDefault();
        var page = $(this).data('page');
        var query = $('#search-input').val();
        var csrfToken = "{{ csrf_token() }}";
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                page: page,
                _token: csrfToken,
                query: query
            },
            success: function (response) {
                $('#search-results').append(response.html);

                if (response.pagination.has_more_pages) {
                    $('#load-more').data('page', response.pagination.current_page + 1);
                } else {
                    $('#pagination-links').remove();
                }
            }
        });
    });
</script>
