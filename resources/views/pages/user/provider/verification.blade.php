@extends('layouts.dashboard')
@section('d-title',__('user.provider_verification'))
@section('title',__('user.provider_verification'))
@section('d-content')
    <div class="row inner-content" id="profile-provider-edit">
        @include('pages.user.provider.partials.steps', ['active'=>2])

        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">@lang('user.provider_verification')</h6>
                    <form class="ajax"
                          id="editProfile"
                          method="POST"
                          action="{{ route('user.update') }}"
                          enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-row">
                            <div class="col-12 col-lg-6">
                                @if ($authUser->company_registration_scan &&  $authUser->provider_verification_status->order != 3)
                                    <div class="file-upload-preview">
                                        <div class="file-upload-info">
                                            <img class="file-upload-img rounded"
                                                 src="{{$authUser->getUrlFor('company_registration_scan','')}}"
                                                 alt="admin image">
                                            <p class="file-upload-name">{{$authUser->company_registration_scan->file_name}}</p>
                                        </div>
                                        @if ($authUser->provider_verification_status->order == 3)
                                            <div class="file-upload-remove" id="remove-200"><span>edit</span></div>
                                        @endif
                                    </div>
                                @elseif(!$authUser->company_registration_scan || $authUser->provider_verification_status->order == 3)
                                    <p class="file-upload-label">@lang('user.upload_company_registration_scan')</p>
                                    <div class="input-group mb-3">
                                        <div class="custom-file d-flex flex-column">
                                            <!-- data-maxSize for max file size in MB.-->
                                            <!-- data-mazFiles for maximum file number.-->
                                            <input class="custom-file-input"
                                                   id="UploadFile-RegisterationScan"
                                                   data-maxFiles="1"
                                                   data-maxSize="{{$maxImageSize}}"
                                                   type="file"
                                                   aria-describedby="UploadFile-RegisterationScan"
                                                   {{--accept="image/*"--}}
                                                   name="company_registration_scan"
                                            />
                                            <label class="custom-file-label" for="UploadFile-RegisterationScan">
                                                @lang('common.choose_file')
                                                <small class="text-muted text-capitalize ml-3">
                                                    @lang('common.attachments_label',['size'=>$maxImageSize])
                                                </small>
                                            </label>
                                            @include('layouts.partials.form-errors', ['input'=>'company_registration_scan'])
                                        </div>
                                    </div>
                                    <div id="attachmentsPreview" data-preview="UploadFile-RegisterationScan"></div>
                                @endif
                            </div>

                            @if ($authUser->provider_verification_status->order != 1)
                                <div class="col-6 col-lg-3 d-flex align-items-center pb-3">
                                    @if ($authUser->provider_verification_status->order == 2)
                                        <img src="{{asset('images/icons/verified.png')}}" alt="verified">
                                    @elseif ($authUser->provider_verification_status->order == 3)
                                        <img src="{{asset('images/icons/unverified.png')}}" alt="unverified">
                                    @endif
                                    <p class="text-{{$authUser->provider_verification_status->color}} text-capitalize mb-0 ml-2">{{$authUser->provider_verification_status->title}}</p>
                                </div>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-lg-6 d-flex align-items-center">
                                @if ($authUser->provider_verification_status->order == 1 && $authUser->company_registration_scan)
                                    <p class="text-capitalize mb-0">@lang('user.pending_admin_verification_label')</p>
                                @elseif ($authUser->provider_verification_status->order == 3 || $authUser->provider_verification_status->order == 1)
                                    <button class="btn btn-danger btn-block"
                                            type="submit">@lang('common.continue')</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
