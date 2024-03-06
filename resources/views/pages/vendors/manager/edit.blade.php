@extends('layouts.admin.dashboard')
@section('title','Edit Vendor')
@section('d-content')
    <form action="{{route('vendor.admin.update',$vendor->id)}}" method="POST" class="ajax" id="vendorUpdate"
          enctype="multipart/form-data">
        @method('PATCH')
        <input type="hidden" name="redirect_to" value="{{url()->previous()}}">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions">
                            <div class="uk-float-right">
                                @include('pages._partials.language-selector')
                            </div>
                        </div>
                        <h3 class="md-card-toolbar-heading-text">
                            Edit Vendor
                        </h3>
                    </div>
                    <div class="md-card-content">
                        @include('pages.vendors.manager.partials.form')
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
                @permission('delete_vendors')
                <button
                    data-uk-modal="{target:'#confirmationModal'}"
                    data-action="{{route('vendor.admin.destroy',$vendor->id)}}"
                    data-append-input="1"
                    data-field_name="redirect_to"
                    data-field_value="{{ url()->previous() }}"
                    data-custom_method='@method('DELETE')'
                    class="confirm-action-button md-btn md-btn-danger md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light mt-20">
                    Delete Vendor
                </button>
                @endpermission
            </div>
        </div>
    </form>
@endsection
