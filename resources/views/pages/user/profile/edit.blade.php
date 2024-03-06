@extends('layouts.dashboard')
@section('d-title',__('user.user_profile'))
@section('title',__('user.user_profile'))
@section('d-content')
    <!-- inner content-->
    <div class="row inner-content" id="profile-edit">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang("user.edit_profile")</h5>
                    <form class="ajax" id="editProfile" method="POST"
                          action="{{ route('user.update', $user->id) }}"
                          enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           id="formInput_profileFirstName"
                                           name="first_name"
                                           value="{{ old('first_name', $user->first_name) }}"
                                           type="text"
                                           placeholder="firstname"
                                           required="required"/>
                                    @include('layouts.partials.form-errors', ['input'=>'first_name'])
                                    <label for="formInput_profileFirstName">@lang('auth.first_name') *</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           id="formInput_profileLastName"
                                           name="last_name"
                                           type="text"
                                           placeholder="last_name"
                                           value="{{ old('last_name',$user->last_name) }}"
                                           required="required"/>
                                    @include('layouts.partials.form-errors', ['input'=>'last_name'])
                                    <label for="formInput_profileLastName">@lang('auth.last_name') *</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           {{!$authUser->isAdmin() ? 'readonly disabled' : '' }}
                                           id="formInput_profileEmail"
                                           name="email"
                                           type="email"
                                           value="{{ old('email',$user->email) }}"
                                           placeholder="email"
                                           required="required"/>
                                    @include('layouts.partials.form-errors', ['input'=>'email'])
                                    <label for="formInput_profileEmail">@lang('auth.email') *</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group form-float-label-phone">
                                    <input class="form-control form-float-control phone"
                                           {{!$authUser->isAdmin() ? 'readonly disabled' : '' }}
                                           id="formInput_profileMobile"
                                           name="mobile"
                                           type="tel"
                                           value="{{ old('mobile',$user->mobile) }}" placeholder="mobile"
                                           required="required"/>
                                    @include('layouts.partials.form-errors', ['input'=>'mobile'])
                                    <label for="formInput_profileMobile">@lang('auth.mobile') *</label>
                                </div>
                            </div>
                            <div class=" col-12 col-md-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           id="formInput_signupPassword"
                                           name="password"
                                           type="password"
                                           placeholder="password *"/>
                                    @include('layouts.partials.form-errors', ['input'=>'password'])
                                    <label for="formInput_signupPassword">@lang('auth.password')</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           id="formInput_signupPasswordConfirm"
                                           name="password_confirmation"
                                           type="password"
                                           placeholder="confirm password *"/>
                                    @include('layouts.partials.form-errors', ['input'=>'password_confirmation'])
                                    <label for="formInput_signupPasswordConfirm">@lang('auth.confirm_password')</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-float-label-group">
                                    <select class='selectize-select'
                                            id="formInput_profileLanguages"
                                            name="locale"
                                            placeholder='Locale'>

                                        @foreach(LaravelLocalization::getSupportedLocales() as $locale => $props)
                                            <option
                                                {{$locale == old('locale', $authUser->locale) ? 'selected' : ''}} value="{{$locale}}">
                                                {{$props['native']}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input class="form-control form-float-control d-none"/>
                                    @include('layouts.partials.form-errors', ['input'=>'languages'])
                                    <label for="formInput_profileLanguages">Locale</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-float-label-group">

                                    @if ($authUser->isAdmin())
                                        <div class="form-group d-flex align-items-center">
                                            <div
                                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between w-100">
                                                <input class="custom-control-input"
                                                       id="formInput_profileMarkEmailVerified"
                                                       name="email_verified_at"
                                                       value="{{now()}}"
                                                       {{ $user->hasVerifiedEmail() ? 'checked' : ''}}
                                                       type="checkbox">
                                                <label class="custom-control-label"
                                                       for="formInput_profileMarkEmailVerified">
                                                    mark email verified
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center">
                                            <div
                                                class="custom-control custom-checkbox d-flex align-items-center justify-content-between w-100">
                                                <input class="custom-control-input"
                                                       id="formInput_profileMarkMobileVerified"
                                                       name="mobile_verified_at"
                                                       value="{{now()}}"
                                                       {{ $user->hasVerifiedMobile() ? 'checked' : ''}}
                                                       type="checkbox">
                                                <label class="custom-control-label"
                                                       for="formInput_profileMarkMobileVerified">
                                                    mark Mobile verified
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-float-label-group">
                                    <p class="file-upload-label mt-3">@lang('user.profile_photo')</p>
                                    <div class="input-group mb-3">
                                        <div class="custom-file d-flex flex-column">
                                            <!-- data-maxSize for max file size in MB.-->
                                            <!-- data-mazFiles for maximum file number.-->
                                            <input class="custom-file-input"
                                                   id="UploadFile-ProfilePhoto"
                                                   data-maxFiles="1"
                                                   data-maxSize="{{$maxImageSize}}"
                                                   type="file"
                                                   name="avatar"
                                                   aria-describedby="UploadFile-ProfilePhoto"
                                                   accept="image/*"/>
                                            @include('layouts.partials.form-errors', ['input'=>'avatar'])
                                            <label class="custom-file-label" for="UploadFile-ProfilePhoto">
                                                @if($user->avatar)
                                                    @lang('common.choose_photo')
                                                @else
                                                    @lang('common.select_photo')
                                                @endif
                                                <small class="text-muted text-capitalize ml-3">
                                                    @lang('common.one_picture_label',['size'=>$maxImageSize])
                                                </small>
                                            </label>
                                        </div>
                                    </div>
                                    <div id="attachmentsPreview" data-preview="UploadFile-ProfilePhoto">
                                        <div class="file-upload-preview">
                                            @if($user->avatar)
                                                <div class="file-upload-info">
                                                    <img class="file-upload-img"
                                                         src="{{ $user->getUrlFor('avatar') }}" alt=""/>
                                                    <p class="file-upload-name">{{$user->avatar->file_name}}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row my-gutter">
                            <div class="col-12 d-flex justify-content-around">
                                <a class="btn btn-outline-danger w-45"
                                   href="{{url()->previous()}}">@lang('common.cancel')</a>
                                <button class="btn btn-danger w-45" type="submit">@lang('common.save')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
