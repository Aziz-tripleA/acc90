@extends('layouts.admin.dashboard')
@section('title','Contacts')
@section('d-content')
    <form action="{{route('contact.admin.update')}}" method="POST" class="ajax" id="configUpdate" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-10-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Contacts
                        </h3>
                    </div>
                    <div class="md-card-content">
                        @foreach($contacts as $key=>$contact)
                            @include('pages.contact.manager.form')
                        @endforeach
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-2-3">
                        <button class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                                type="submit">
                            Update
                        </button>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <a href="{{url()->previous()}}"
                            class="md-btn md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection