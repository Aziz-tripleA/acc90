@extends('layouts.dashboard')
@section('title','Notifications')
@section('d-title','Notifications')
@section('d-buttons')

    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Filter Events Notifications</h6>
                <form action="#" method="POST">
                    <div class="input-group">
                        <input class="form-control" type="text"
                               aria-describedby="EventsNotifications-search"
                               aria-label="search Events Notifications"
                               placeholder="search Events Notifications">
                        <div class="input-group-append">
                            <button class="btn input-group-text" type="submit" id="EventsNotifications-search"><i
                                    class="material-icons">search</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('d-content')

    <div class="row inner-content" id="orders-content">
        @if (!$events->count())
            @include('pages._partials.no-listing-data')
        @else
            @foreach ($events as $event)
                <div class="col-12 mb-4">
                    @include('pages.notifications.partials.info')
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
{{--        {{ $events->links() }}--}}
    </div>
@endsection
