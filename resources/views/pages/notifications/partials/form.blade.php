@csrf
@method('PATCH')
<div class="form-row">

    <div class="col-12">
        <p class="inner-form-title">Choose Language</p>
        <div class="form-float-label-group mb-4">
            <i
                class="fas fa-chevron-down custom-lang-arrow"></i>
            <select
                class="custom-lang-select" name="lang-select">
                <option value="en">English</option>
                <option value="ar">Arabic</option>
            </select>
        </div>
    </div>
    <div class="col-12 col-md-6">
        @foreach($locales as $locale)
            <div class="form-float-label-group {{$locale}}-item">
                <input class="form-control form-float-control"
                       id="formInput_serviceTitle{{$locale}}" name="email_subject[{{$locale}}]"
                       value="{{isset($email)?$email->getTranslationWithoutFallback('subject',$locale):''}}"
                       tabindex="3" type="text" placeholder="Title [{{$locale}}]">
                @include('layouts.partials.form-errors')
                <label for="formInput_serviceTitle{{$locale}}">Email Subject [{{$locale}}]</label>
            </div>
        @endforeach
    </div>
</div>
<div class="form-row">
    @foreach($locales as $locale)
        <div class="col-12 {{$locale}}-item">
            <label for="formInput_serviceTitle{{$locale}}">Email Body [{{$locale}}]</label>
            <div class="form-float-label-group title-{{$locale}}">
                <textarea class="editable"
                          id="formInput_pageContent{{$locale}}"
                          name="email_body[{{$locale}}]" cols="30" rows="5"
                          placeholder="Email Body [{{$locale}}]">{{isset($email)?$email->getTranslationWithoutFallback('body',$locale):''}}</textarea>
                @include('layouts.partials.form-errors')
            </div>
        </div>
    @endforeach
</div>
<div class="form-row">
    <div class="col-12 col-md-6">
        <div class="form-group mb-0 d-flex align-items-center">
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between w-100">
                <input class="custom-control-input" id="formInput_emailactive"
                       type="checkbox"
                       name="email_active" {{ isset($email) && $email->is_active?'checked':'' }}>
                <label class="custom-control-label" for="formInput_emailactive">Email is active</label>
            </div>
        </div>
    </div>
</div>

        <div class="form-row">
            <div class="col-12 col-md-6">
                @foreach($locales as $locale)
                    <div class="form-float-label-group {{$locale}}-item mb-4 pb-3">
                        <input class="form-control form-float-control"
                               id="formInput_PNTitle{{$locale}}" name="pn_subject[{{$locale}}]"
                               value="{{isset($PN)?$PN->getTranslationWithoutFallback('subject',$locale):''}}"
                               tabindex="3" type="text" placeholder="PN Title [{{$locale}}]">
                        @include('layouts.partials.form-errors')
                        <label for="formInput_PNTitle{{$locale}}">PN Title [{{$locale}}]</label>
                    </div>
                @endforeach
            </div>
            <div class="col-12 col-md-6">

                @foreach($locales as $locale)
                    <div class="form-float-label-group {{$locale}}-item mb-4 pb-3">
                        <input class="form-control form-float-control"
                               id="formInput_PNBody{{$locale}}" name="pn_body[{{$locale}}]"
                               value="{{isset($PN)?$PN->getTranslationWithoutFallback('body',$locale):''}}"
                               tabindex="3" type="text" placeholder="PN Body [{{$locale}}]">
                        @include('layouts.partials.form-errors')
                        <label for="formInput_PNBody{{$locale}}">PN Body [{{$locale}}]</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-6">
                <div class="form-float-label-group mb-4 pb-3">
                    <input
                        class="form-control form-float-control" id="formInput_PNLink" name="pn_links"
                        type="text" placeholder="PN Link">
                    @include('layouts.partials.form-errors')
                    <label for="formInput_PNLink">PN Link</label>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <p class="file-upload-label">PN Icon</p>
                <div class="input-group mb-3">
                    <div class="custom-file d-flex flex-column">
                        <!-- data-maxSize for max file size in MB.-->
                        <!-- data-mazFiles for maximum file number.-->
                        <input class="custom-file-input"
                             name="pn_icon" id="UploadFile-1"
                             data-maxfiles="1"
                             data-maxsize="5"
                             type="file"
                             aria-describedby="UploadFile-1"
                             accept="image/*"
                             required="required">
                        <label class="custom-file-label" for="UploadFile-1">select photo </label>
                        @include('layouts.partials.form-errors')
                    </div>
                </div>
                <div id="attachmentsPreview" data-preview="UploadFile-1"></div>
            </div>
        </div>
<div class="form-row">
    <div class="col-12 col-md-6">
        <div class="form-group mb-0 d-flex align-items-center">
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between w-100">
                <input class="custom-control-input" id="formInput_pnactive"
                       type="checkbox"
                       name="pn_active" {{ isset($PN) && $PN->is_active?'checked':'' }}>
                <label class="custom-control-label" for="formInput_pnactive">Email is active</label>
            </div>
        </div>
    </div>
</div>

        <div class="form-row">
            <div class="col-12 my-gutter d-flex justify-content-around"><a
                    class="btn btn-outline-danger w-45" href="{{ route('notification.manager.index') }}">cancel</a>
                <button class="btn btn-danger w-45" type="submit">save</button>
            </div>
        </div>
