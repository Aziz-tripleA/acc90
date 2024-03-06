@csrf
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-2">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Banner Image
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-form-row">
                    <input type="file" id="cover" name="cover" class="dropify"
                           data-max-file-size="2M"
                           @if(isset($about) && $about->getUrlFor('cover')) data-default-file="{{$about->getUrlFor('cover')}}" @endif/>
                    @include("layouts.partials.form-errors",['field'=>'cover'])
                </div>
            </div>
        </div>
        @include("layouts.partials.form-errors",['field'=>"cover"])
    </div>
    <div class="uk-width-medium-1-1">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    First Section
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <label for="about_title">Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($about)?$about->first_section_title:''}}"
                            id="about_title"
                            name="first_section_title"/>
                        @include("layouts.partials.form-errors",['field'=>"first_section_title"])
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label for="about_title">Sub Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($about)?$about->first_section_subtitle:''}}"
                            id="about_title"
                            name="first_section_subtitle"/>
                        @include("layouts.partials.form-errors",['field'=>"first_section_subtitle"])
                    </div>
                    <div class="uk-width-medium-1-2" >
                        <label for="about_content">Text</label>
                        <textarea class="no_autosize tinymce" name="first_section_text"
                                id="about_content"
                        >{{isset($about)?$about->first_section_text:''}}</textarea>
                        @include("layouts.partials.form-errors",['field'=>"first_section_text"])
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Second Section
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="about_title">Second Section Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($about)?$about->second_section_title:''}}"
                            id="about_title"
                            name="second_section_title"/>
                        @include("layouts.partials.form-errors",['field'=>"second_section_title"])
                    </div>
                    <div class="uk-width-medium-1-2" >
                        <label for="second_section_text">Second Section Text</label>
                        <textarea class="no_autosize tinymce" name="second_section_text"
                                id="second_section_text"
                        >{{isset($about)?$about->second_section_text:''}}</textarea>
                        @include("layouts.partials.form-errors",['field'=>"second_section_text"])
                    </div>                    
                    <div class="uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Second Section Image
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <input type="file" id="first_image" name="first_image" class="dropify"
                                        data-max-file-size="2M"
                                        @if(isset($about) && $about->getUrlFor('first_image')) data-default-file="{{$about->getUrlFor('first_image')}}" @endif/>
                                    @include("layouts.partials.form-errors",['field'=>"first_image"])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Third Section
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <label for="about_title">Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($about)?$about->third_section_title:''}}"
                            id="about_title"
                            name="third_section_title"/>
                        @include("layouts.partials.form-errors",['field'=>"third_section_title"])
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label for="third_section_video_url">Video URL</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($about)?$about->third_section_video_url:''}}"
                            id="third_section_video_url"
                            name="third_section_video_url"/>
                        @include("layouts.partials.form-errors",['field'=>"third_section_video_url"])
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Background Image
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <input type="file" id="second_image" name="second_image" class="dropify"
                                        data-max-file-size="2M"
                                        @if(isset($about) && $about->getUrlFor('second_image')) data-default-file="{{$about->getUrlFor('second_image')}}" @endif/>
                                    @include("layouts.partials.form-errors",['field'=>"second_image"])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Fourth Section
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="about_title">Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($about)?$about->fourth_section_title:''}}"
                            id="about_title"
                            name="fourth_section_title"/>
                        @include("layouts.partials.form-errors",['field'=>"fourth_section_title"])
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    PDF file
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <input type="file" id="pdf_file" name="pdf_file" class="dropify"
                                        data-max-file-size="2M"
                                        @if(isset($about) && $about->getUrlFor('pdf_file')) data-default-file="{{$about->getUrlFor('pdf_file')}}" @endif/>
                                    @include("layouts.partials.form-errors",['field'=>"pdf_file"])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Fifth Section
                </h3>
            </div>
            <div class="md-card-content">    
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="about_title">Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($about)?$about->fifth_section_title:''}}"
                            id="about_title"
                            name="fifth_section_title"/>
                        @include("layouts.partials.form-errors",['field'=>"fifth_section_title"])
                    </div>
                    <div class="uk-width-medium-1-2" >
                        <label for="fifth_section_text">Text</label>
                        <textarea class="no_autosize tinymce" name="fifth_section_text"
                                id="fifth_section_text"
                        >{{isset($about)?$about->fifth_section_text:''}}</textarea>
                        @include("layouts.partials.form-errors",['field'=>"fifth_section_text"])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Sixth Section
                </h3>
            </div>
            <div class="md-card-content"> 
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="about_title">Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($about)?$about->sixth_section_title:''}}"
                            id="about_title"
                            name="sixth_section_title"/>
                        @include("layouts.partials.form-errors",['field'=>"sixth_section_title"])
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Image
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <input type="file" id="third_image" name="third_image" class="dropify"
                                        data-max-file-size="2M"
                                        @if(isset($about) && $about->getUrlFor('third_image')) data-default-file="{{$about->getUrlFor('third_image')}}" @endif/>
                                    @include("layouts.partials.form-errors",['field'=>"third_image"])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
