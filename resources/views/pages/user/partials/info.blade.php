<div class="cards-collection">
    <div class="card">
        <div class="card-body">
            <h6 class="card-subtitle">contact info</h6>
            <div class="desc-list">
                <dl>
                    <dt><i class="material-icons">mail</i></dt>
                    <dd>{{$user->email}}</dd>
                </dl>
                @if($user->phone)
                    <dl>
                        <dt><img src="{{asset('images/icons/phone-blue-outline.png')}}"></dt>
                        <dd>{{$user->phone}}</dd>
                    </dl>
                @endif
                <dl>
                    <dt><img src="{{asset('images/icons/phone-blue-outline.png')}}"></dt>
                    <dd>{{$user->mobile}}</dd>
                </dl>
                @if($user->location)
                    <dl>
                        <dt><img src="{{asset('images/icons/map-pin-blue-outline.png')}}"></dt>
                        <dd>{{$user->location}}</dd>
                    </dl>
                @endif
            </div>
        </div>
    </div>
    @if($user->intro)
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">@lang('user.intro')</h6>
                <div class="description-content">
                    <p class="card-text">{{$user->intro}}</p>
                </div>
            </div>
        </div>
    @endif
    @if($user->categories->count())
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">@lang('user.categories')</h6>
                <div class="badges-group">
                    @foreach ($user->categories as $item)
                        <span class="badge badge-outline-secondary">{{$item->name}}</span>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if($user->languages)
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle">@lang('common.languages')</h6>
                <div class="badges-group">
                    @foreach ($user->getArrayFor('languages') as $item)
                        <span class="badge badge-outline-secondary">@lang("common.$item")</span>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if(!$user->hasRole('admin'))
        <div class="card-reviews">
            <div class="card-header">
                <h6 class="card-subtitle">@lang('review.reviews')</h6>
            </div>
            <div class="card-body">
                @if($user->hasRole('provider'))
                    <nav>
                        <div class="nav nav-tabs" id="reviews-tab" role="tablist">
                            <a class="nav-item nav-link active" id="reviews-customer-tab" data-toggle="tab"
                               href="#reviews-customer" role="tab" aria-controls="reviews-customer"
                               aria-selected="true">
                                @lang('review.as_customer')
                            </a>
                            <a class="nav-item nav-link" id="reviews-provider-tab" data-toggle="tab"
                               href="#reviews-provider"
                               role="tab" aria-controls="reviews-provider"
                               aria-selected="false">
                                @lang('review.as_provider')
                            </a>
                        </div>
                    </nav>
                @endif
                <div class="tab-content" id="reviews-tabContent">
                    @if($user->hasRole('customer'))
                        <div class="tab-pane fade show active" id="reviews-customer" role="tabpanel"
                             aria-labelledby="reviews-customer-tab">
                            @include('pages.user.partials.reviews', ['reviews'=> $customerReviews])
                        </div>
                    @endif
                    @if($user->hasRole('provider'))
                        <div class="tab-pane fade" id="reviews-provider" role="tabpanel"
                             aria-labelledby="reviews-provider-tab">
                            @include('pages.user.partials.reviews', ['reviews'=> $providerReviews])
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
