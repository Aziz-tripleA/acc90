@extends('layouts.dashboard')
@section('title') @lang('user.provider_verification') @endsection
@section('d-title') @lang('user.provider_verification') @endsection
@section('d-content')
    @php
        $subscription = $user->active_package;
        $info = $subscription->info;
    @endphp
    <!-- inner content-->
    <div class="row inner-content" id="profile-provider-subscriptions">
        @include('pages.user.provider.partials.steps', ['active'=>3])

        <div class="col-12 mb-4">
            <div class="card mb-4">
                <div class="card-body py-2">
                    <small class="text-capitalize text-primary">you are on</small>
                    <div class="subscriptions-list subscriptions-list-lg">
                        <dl class="p-0">
                            <dt>{{$info->title}} package</dt>
                            <dd class="text-danger">
                                @if($info->price > 0) {{$info->price}} {{$helper->getCurrencyNameFor('sa')}} @else @lang('package.free') @endif
                                / @if($info->duration) @if($subscription->remaining) {{$subscription->remaining}} @lang('common.days_left') @else @lang('common.expired') @endif @else @lang('package.unlimited') @endif
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="subscriptions-list">
                        @foreach ($info->limits as $name=>$count)
                            <dl>
                                <dt>{{$name}}</dt>
                                <dd class="text-danger">
                                    {{count($user->getUserSubscriptionLimits()[$name] ?? [])}} /
                                    {{$count}}
                                </dd>
                            </dl>
                        @endforeach
                    </div>
                </div>
            </div>
            @if(!$subscription->package->info->default)
                <button class="btn btn-danger btn-block confirm-action-button"
                        data-action="{{route('subscription.store')}}"
                        data-append-input="1"
                        data-field_name="package_info_id"
                        data-field_value="{{$subscription->package->info->id}}"
                        data-label="Please be noted that all remaining limits will be reset"
                        data-reload="1">
                    @lang('package.renew_now')
                </button>
            @endif
        </div>
    </div>

    <div class="row inner-header mt-gutter">
        <!-- Make sure you add ".inner-title > h3" for page title,-->
        <!-- also .inner-btns to buttons parent container-->
        <div class="col-12 col-md inner-title">
            <h3>@lang('package.other_packages')</h3>
        </div>
    </div>
    <div class="row inner-content" id="subscriptions-otherPackages">
        @foreach ($packages as $package)
            <div class="col-12 col-md-6 mb-4">
                @include('pages.packages.partials.info')
            </div>
        @endforeach
    </div>
@endsection
