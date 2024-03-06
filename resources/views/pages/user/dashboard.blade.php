@extends('layouts.dashboard')
@section('title',__('user.my_profile'))
@section('d-content')
    @php
        $providerReviews = $user->getReceivedReviewsAs('provider');
        $customerReviews = $user->getReceivedReviewsAs('customer');
    @endphp
    @if ($user->isProvider() && $related_rfps->count() )
        <div class="row inner-header">
            <div class="col-12 col-md inner-title">
                <h3>@lang('user.relevant_request_for_proposals')</h3>
            </div>
            <div class="col-12 col-md-4 inner-btns">
                <a class="btn btn-link text-danger" href="{{route('rfp.index')}}">view all RFPs</a>
            </div>
        </div>
        <div class="row inner-content">
            <div class="col-12 mb-4">
                <div class="swiper-container pb-4 related-slider">
                    <div class="swiper-wrapper">
                        @foreach ($related_rfps as $rfp)
                            <div class="swiper-slide">
                                @include('pages.rfps.partials.info')
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="card-banner">
                    <img class="card-img" src="{{asset('images/backgrounds/main-bg.jpg')}}">
                    <div class="card-img-overlay">
                        <h5 class="card-title">searching for the best price ?</h5>
                        {{--@if ($user->canCreateMore('rfps'))--}}
                            <a class="btn btn-danger btn-sm" href="RFPs-manager-add.html">post a request for
                                proposal</a>
                        {{--@endif--}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row inner-header mt-gutter">
        <!-- Make sure you add ".inner-title > h3" for page title,-->
        <!-- also .inner-btns to buttons parent container-->
        <div class="col-12 col-md inner-title">
            <h3>@lang('user.my_profile')</h3>
        </div>
    </div>
    <div class="row inner-content" id="profile-content">
        <div class="col-12">
            <div class="new-card-profie card-profile mb-4">
                <div class="card-header">
                    <div class="dropleft">
                        <button class="btn btn-link dropdown-toggle" id="profileDropdown" data-offset="40,0"
                                data-toggle="dropdown" type="button" aria-expanded="false" aria-haspopup="true">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{route('user.edit')}}">@lang('user.edit_basic_profile')</a>
                            @if($authUser->hasRole('provider'))
                                <a class="dropdown-item"
                                   href="{{route('user.provider.info')}}">@lang('user.edit_provider_profile')</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-content-basic">
                        <div class="user-data">
                            <div class="user-img-lg align-items-center">
                                <img class="img-thumbnail border-primary"
                                     src="{{ $user->getUrlFor('avatar') ?: $avatarDef }}" alt="admin image">
                            </div>
                            <h4 class="text-primary">
                                {{ $user->full_name }}
                                @if ($user->hasCompleteVerification())
                                    <img src="{{asset('images/icons/verified.png')}}">
                                @endif
                            </h4>
                            <p>@lang('user.registered_since') {{$user->created_at->diffForHumans()}}</p>
                            <span class="badge badge-{{$user->status->color}} text-capitalize">
                                    {{$user->status->title}}
                                </span>
                        </div>
                    </div>
                    <div class="card-content-stat">
                        <div class="card-rating flex-column">
                            <p>customer ratings</p>
                            @include('pages._partials.rating', ['rate'=>$customerReviews->pluck('rate')->avg()])
                        </div>
                        <div class="card-rating flex-column">
                            <p>Provider rating</p>
                            @include('pages._partials.rating', ['rate'=>$providerReviews->pluck('rate')->avg()])
                        </div>
                        <div class="desc-list justify-content-center mt-3">
                            <dl>
                                <dt>{{count($user->orders_delivered)}}</dt>
                                <dd class="text-capitalize">delivered orders</dd>
                            </dl>
                        </div>
                        <div class="desc-list flex-row">
                            @if ($user->hasVerifiedEmail())
                                <dl class="flex-column">
                                    <dt><img src="{{asset('images/icons/verified.png')}}"></dt>
                                    <dd>verified email</dd>
                                </dl>
                            @endif
                            @if ($user->hasVerifiedMobile())
                                <dl class="flex-column">
                                    <dt><img src="{{asset('images/icons/verified.png')}}"></dt>
                                    <dd>verified phone</dd>
                                </dl>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer social-footer dashboard-social">
                    <div class="card-social">
                        <div class="card-body">
                            @if($user->facebook_account)
                                <a class="card-social-icon text-facebook" target="_blank"
                                   href="{{$user->facebook_account}}">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            @endif
                            @if($user->twitter_account)
                                <a class="card-social-icon text-twitter" target="_blank"
                                   href="{{$user->twitter_account}}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if($user->linkedin_account)
                                <a class="card-social-icon text-linked-in" target="_blank"
                                   href="{{$user->linkedin_account}}">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif
                            @if($user->website)
                                <a class="card-social-icon text-instagram" target="_blank" href="{{$user->website}}">
                                    <i class="fas fa-globe"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.user.partials.info')
        </div>
    </div>
@endsection
