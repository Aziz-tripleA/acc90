<div class="col-12 mb-4">
    <nav class="nav-steps">
        {{-- 1 --}}
        <div class="steps-single steps-single-completed">
            <a class="steps-link {{$active == 1 ? 'active' : ''}}" href="{{route('user.provider.info')}}">1</a>
            @if($authUser->isProvider())
                <i class="material-icons">done</i>
            @endif
            <p class="steps-title">{{ trans('user.provider_info') }}</p>
        </div>

        {{-- 2 --}}
        <div class="steps-single">
            <a class="steps-link {{$active == 2 ? 'active' : ''}}" href="{{route('user.provider.verify')}}">2</a>
            @if($authUser->is_verified_provider)
                <i class="material-icons">done</i>
            @endif
            <p class="steps-title">{{ trans('user.provider_verification') }}</p>
        </div>

        {{-- 3 --}}
        <div class="steps-single">
            <a class="steps-link {{$active == 3 ? 'active' : ''}}"
                href="{{$authUser->isProvider() ? route('user.provider.subscription') : ''}}">
                3
            </a>
            <i class="material-icons">done</i>
            <p class="steps-title">{{ trans('user.my_subscription') }}</p>
        </div>
    </nav>
</div>
