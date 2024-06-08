

            @if (!$searchResults->count())
                @include('pages._partials.no-listing-data')
            @else

                    @foreach ($searchResults as $result)
                        <a class="book-item wow fadeInUp" href="{{ $result->url }}" style="margin: 1rem 1rem 4rem 1rem;width: calc(31%)">
                            <div class="book-item-img">
                                <img src="{{ $result->searchable->cover?$result->searchable->cover->getUrl(): ($result->searchable->s_img?:($result->searchable->l_img?:asset('assets/images/default_image.png')))}}" alt="" />
                            </div>
                            <div class="book-item-data">
                                <div class="book-item-content">
                                    <span>{{ $result->searchable->category?$result->searchable->category->cat_name:''}}</span>
                                    <h3>{{ $result->title }}</h3>
                                    <strong>{{ $result->searchable->author?$result->searchable->author->author_name:'' }}</strong>
                                </div>
                                <div class="book-item-action">
                                    <span>المزيد</span>
                                </div>
                            </div>
                        </a>
                    @endforeach

            @endif

