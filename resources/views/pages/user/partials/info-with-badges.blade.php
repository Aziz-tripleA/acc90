@php
    $class = $class ?? 'font-weight-normal';
@endphp

<a class="user-name {{$class}}" href="{{ route('user.show',$user->id) }}">
    {{$user->full_name}}
    @if ($user->active_package)
        <img data-placement="bottom"
            data-toggle="tooltip"
            src="{{$user->active_package->package->badge->getUrl() ?: null}}"
            title="{{$user->active_package->title}} Member"/>
    @endif
    @if ($user->canUpgradePackage())
        <img data-placement="bottom"
            data-toggle="tooltip"
            src="{{asset('images/icons/badge-2.png')}}"
            title="Activated Member"/>
    @endif
</a>
