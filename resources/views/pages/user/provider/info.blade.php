@extends('layouts.dashboard')
@section('d-title') @lang("user.provider_info") @endsection
@section('title') @lang("user.provider_info") @endsection
@section('d-content')

    <div class="row inner-content" id="profile-provider-add">
        @include('pages.user.provider.partials.steps', ['active'=>1])

        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">@lang("user.provider_info")</h6>
                    <form class="ajax" id="editProfile" method="POST" action="{{ route('user.update') }}" aria-label="">
                        @method('PATCH')
                        @csrf

                        <div class="form-row">
                            @include('pages._partials.language-selector')
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <select class='selectize-select'
                                            id="formInput_profileSkills"
                                            name="categories[]"
                                            multiple
                                            placeholder='{{ trans('user.categories') }} *'>
                                        @foreach($categories as $category)
                                            <optgroup label="{{ $category->name }}">
                                                @php
                                                    $ids = $user->categories->pluck('id')->all();
                                                @endphp

                                                @foreach($category->descendants as $child)
                                                    <option {{in_array($child->id, old('categories', $ids)) ? 'selected' : ''}}
                                                            value="{{ $child->id }}">
                                                        {{ $child->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <input class="form-control form-float-control d-none"/>
                                    @include('layouts.partials.form-errors', ['input'=>'categories'])
                                    <label for="formInput_profileSkills">{{ trans('user.categories') }}
                                        *</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           id="formInput_profileOrganizationName"
                                           name="organization_name"
                                           type="text"
                                           placeholder="{{ trans('user.organization_name') }}"
                                           value="{{ old('organization_name', $user->organization_name) }}"/>
                                    @include('layouts.partials.form-errors', ['input'=>'organization_name'])
                                    <label for="formInput_profileOrganizationName">{{ trans('user.organization_name') }}</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    @include('pages._partials.form-location', [
                                                                    'dashboard'=>true,
                                        'location' => $user->location,
                                        'lat' => $user->lat,
                                        'label'=>true,
                                        'required'=>true,
                                        'long' => $user->long,
                                    ])
                                </div>
                                <div class="card-map d-none">
                                    <div class="map"></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                @foreach($locales as $locale)
                                    <div class="form-float-label-group {{$locale}}-item">
                                        <textarea class="form-control form-float-control"
                                                  id="formInput_profileAbout" name="intro[{{$locale}}]" cols="30"
                                                  rows="5"
                                                  wrap="hard"
                                                  placeholder="@lang('user.intro')[{{$locale}}] *"
                                        >{{$user->getTranslationWithoutFallback('intro', $locale)}}</textarea>
                                        @include('layouts.partials.form-errors')
                                        <label class="bg-new-gray" for="formInput_profileAbout">@lang('user.intro')
                                            [{{$locale}}] * </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           id="formInput_profileFullAddress"
                                           name="full_address"
                                           type="text"
                                           placeholder="{{ trans('user.address') }}"
                                           value='{{ old('full_address',$user->full_address) }}'/>
                                    @include('layouts.partials.form-errors', ['input'=>'full_address'])
                                    <label for="formInput_profileFullAddress">{{ trans('user.address') }}</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           id="formInput_profileWebsite"
                                           name="website"
                                           type="text"
                                           placeholder="{{ trans('user.website') }}"
                                           value="{{ old('website',$user->website) }}"/>
                                    @include('layouts.partials.form-errors', ['input'=>'website'])
                                    <label for="formInput_profileWebsite">{{ trans('user.website') }}</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <input class="form-control form-float-control"
                                           id="formInput_profileLinkedinAccount"
                                           name="linkedin_account"
                                           type="text"
                                           placeholder="{{ trans('user.linkedin_account') }}"
                                           value="{{ old('linkedin_account',$user->linkedin_account) }}"/>
                                    @include('layouts.partials.form-errors', ['input'=>'linkedin_account'])
                                    <label for="formInput_profileLinkedinAccount">{{ trans('user.linkedin_account') }}</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-float-label-group">
                                    <select class='selectize-select'
                                            id="formInput_profileLanguages"
                                            name="languages[]"
                                            multiple
                                            placeholder='{{ trans('user.languages') }}*'>
                                        @php
                                            $langs = $user->getArrayFor('languages');
                                        @endphp

                                        @foreach($languages as $name)
                                            <option {{in_array($name, old('languages', $langs)) ? 'selected' : ''}}
                                                    value="{{$name}}">
                                                @lang("common.$name")
                                            </option>
                                        @endforeach
                                    </select>
                                    <input class="form-control form-float-control d-none"/>
                                    @include('layouts.partials.form-errors', ['input'=>'languages'])
                                    <label for="formInput_profileLanguages">{{ trans('user.languages') }}*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row my-gutter">
                            <div class="col-12 d-flex justify-content-around">
                                <a class="btn btn-outline-danger w-45" href="{{route('user.dashboard')}}">
                                    @lang("common.cancel")
                                </a>
                                <button class="btn btn-danger w-45" type="submit">@lang("common.save")</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
