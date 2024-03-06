@extends('layouts.admin.dashboard')
@section('title','Add New Service')
@section('d-content')
    <form action="{{route('service.admin.store')}}" method="POST" class="ajax" id="brandStore" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar">

                        <h3 class="md-card-toolbar-heading-text">
                            Add New Service
                        </h3>
                    </div>
                    <div class="md-card-content">
                        @include('pages.services.manager.partials.form')
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-2-3">
                        <button class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                                type="submit">
                            Submit
                        </button>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <a href="{{url()->previous()}}" class="md-btn md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
            <div class="uk-width-large-3-10">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-float-right">
                            <input type="checkbox" @isset($service)
                                @if($service->is_featured) checked @endif
                                @else checked @endisset data-switchery
                                data-input_name="is_featured"
                                data-value="1"
                                data-reversed_value="0"
                                class="statusChange"/>
                        </div>
                        <label class="uk-display-block uk-margin-small-top">Featured</label>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label for="brand_title">Featured Order</label>
                                <input class="md-input"
                                    type="text"
                                    @isset($service) value="{{isset($service)? $service->home_order:''}}"
                                    @endisset
                                    id="brand_title"
                                    name="home_order"/>
                                @include("layouts.partials.form-errors",['field'=>"home_order"])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('d-scripts')
    <script src="{{asset('assets/admin/js/uikit_fileinput.js')}}"></script>
    <script>
        $("input#status").on('change', function () {
            if ($(this).prop("checked") === true) {
                $("input[type='hidden'][name='status_id']").val(1);
            } else {
                $("input[type='hidden'][name='status_id']").val(2);
            }
        })
    </script>
    <script src="{{asset('assets/admin/js/wysiwyg.js')}}"></script>
@endsection
