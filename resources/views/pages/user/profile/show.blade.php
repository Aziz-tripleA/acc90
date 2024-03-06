@extends('layouts.front')
@section('f-content')
    <!-- Make sure you add ".inner-title > h3" for page title,-->
    <!-- also .inner-btns to buttons parent container-->
    @php
        $providerReviews = $user->getReceivedReviewsAs('provider');
        $customerReviews = $user->getReceivedReviewsAs('customer');
    @endphp

    <div class="col-12 mb-4 inner-title">
        <h1>user profile</h1>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12 col-md-4">
                @include('pages.user.partials.profile-card', ['show_row'=>true])
                @if (auth()->check() && $authUser->isAdmin())
                    <form action="{{route('user.update', $user->id)}}" method="post">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="status_id" value="{{
                        $user->is_active ? $status->firstWhere('order', 2)->id : $status->firstWhere('order', 1)->id
                    }}">
                        <button class="btn btn-outline-danger btn-block mb-4">{{$user->is_active ? 'deactivate' : 'activate'}}
                            user
                        </button>
                    </form>
                @endif
            </div>
            <div class="col-12 col-md-8">
                <!-- inner content-->
                <div class="row inner-content" id="profile-content">
                    <div class="col-12">
                        @include('pages.user.partials.info')
                    </div>
                </div>
                <!-- inner header-->
                @if(sizeof($user->services))
                    <div class="row inner-header mt-gutter">
                        <!-- Make sure you add ".inner-title > h3" for page title,-->
                        <!-- also .inner-btns to buttons parent container-->
                        <div class="col-12 col-md inner-title">
                            <h3>provider services</h3>
                        </div>
                    </div>
                    <div class="row inner-content" id="providerServices-content">
                        <div class="col-12">
                            <div class="swiper-container pb-5 pr-3">
                                <div class="swiper-wrapper">
                                    @foreach ($user->services as $service)
                                        <div class="swiper-slide">
                                            @include('pages.services.partials.info')
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
