@extends('layouts.admin.dashboard')
@section('title',$user->full_name)
@section('d-content')
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-7-10">
            <div class="md-card">
                <div class="user_heading">
                    <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                        {{--<div class="fileinput-new thumbnail">--}}
                        {{--<img src="{{$user->getUrlFor('avatar')?:$adminAvatarDef}}" alt="user avatar"/>--}}
                        {{--</div>--}}
                        <div class="fileinput-preview fileinput-exists thumbnail">
                        </div>
                    </div>
                    <div class="user_heading_content">
                        <h2 class="heading_b">

                            <span class="uk-text-truncate" id="user_edit_uname">{{$user->full_name}}</span>
                            <span class="sub-heading"
                                  id="user_edit_position">Registered on {{$helper->defaultDateFormatter($user->created_at)}}</span>
                        </h2>
                    </div>
                </div>
                <div class="user_content">
                    <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                        <li class="uk-active">
                            <a href="#">Basic Information</a>
                        </li>
                        <li>
                            <a href="#">Addresses</a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="#">Clinic List</a>--}}
{{--                        </li>--}}
                    </ul>
                    <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                        <li>
                            @include('pages.user.manager.partials.forms.info')
                        </li>
                        <li>
                            @forelse($user->addresses as $key=>$address)
                                @include('pages.user.manager.partials.forms.address')
                            @empty
                                <h3 class="full_width_in_card heading_c">
                                    No Addresses Yet
                                </h3>
                            @endforelse
                        </li>
{{--                        <li>--}}
{{--                            @include('pages.user.manager.partials.forms.clinic_list')--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="uk-width-large-3-10">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_c uk-margin-medium-bottom">Other settings</h3>
                    <div class="uk-form-row mb-20">
                        <input id="status" type="checkbox" @if($user->is_active) checked @endif
                        data-switchery id="user_edit_active"/>
                        <label for="user_edit_active" class="inline-label">User Active</label>
                    </div>
                </div>
            </div>
            @permission('delete_customers')
            <button
                data-uk-modal="{target:'#confirmationModal'}"
                data-action="{{route('user.admin.destroy',$user->id)}}"
                data-append-input="1"
                data-field_name="redirect_to"
                data-field_value="{{ url()->previous() }}"
                data-custom_method='@method('DELETE')'
                class="confirm-action-button md-btn md-btn-danger md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light mt-20">
                Delete User
            </button>
            @endpermission
        </div>
    </div>
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
@endsection
