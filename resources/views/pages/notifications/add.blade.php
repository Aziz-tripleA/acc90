@extends('layouts.dashboard')
@section('title','Notifications')
@section('d-title','Notifications')
@section('d-content')
    <div class="row inner-content">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-0"><h6 class="card-title">add new Events Notifications</h6>
                    <form class="ajax" id="systemPagesForm" method="POST" action="{{ route('notification.store') }}" novalidate=""
                          enctype="multipart/form-data">
                        @include('pages.notifications.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
