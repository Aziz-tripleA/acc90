@extends('layouts.admin.dashboard')
@section('title','Edit Service')
@section('d-content')
    <form action="{{route('service.admin.update',$service->id)}}" method="POST" class="ajax" id="brandUpdate"
          enctype="multipart/form-data">
        @method('PATCH')
        <input type="hidden" name="redirect_to" value="{{url()->previous()}}">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        
                        <h3 class="md-card-toolbar-heading-text">
                            Edit Service
                        </h3>
                    </div>
                    <div class="md-card-content">
                        @include('pages.services.manager.partials.form')
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-2-3">
                        <button
                            class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                            type="submit">
                            Save
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
                @can('view_dashboard')
                <button
                    data-uk-modal="{target:'#confirmationModal'}"
                    data-action="{{route('service.admin.destroy',$service->id)}}"
                    data-append-input="1"
                    data-field_name="redirect_to"
                    data-field_value="{{ url()->previous() }}"
                    data-custom_method='@method('DELETE')'
                    class="confirm-action-button md-btn md-btn-danger md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light mt-20">
                    Delete Service
                </button>
                @endcan
            </div>
        </div>
    </form>
@endsection
@section('d-scripts')
    <script src="{{asset('assets/admin/js/wysiwyg.js')}}"></script>
@endsection
