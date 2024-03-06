@csrf
<div class="uk-grid" data-uk-grid-margin>
    
    <div class="uk-width-medium-1-1">
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Slider Section
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <label for="home_title">Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($home)?$home->first_section_title:''}}"
                            id="home_title"
                            name="first_section_title"/>
                        @include("layouts.partials.form-errors",['field'=>"first_section_title"])
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label for="home_title">Sub Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($home)?$home->first_section_subtitle:''}}"
                            id="home_title"
                            name="first_section_subtitle"/>
                        @include("layouts.partials.form-errors",['field'=>"first_section_subtitle"])
                    </div>
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
                                           @if(isset($home) && $home->getUrlFor('cover')) data-default-file="{{$home->getUrlFor('cover')}}" @endif/>
                                    @include("layouts.partials.form-errors",['field'=>'cover'])
                                </div>
                            </div>
                        </div>
                        @include("layouts.partials.form-errors",['field'=>"cover"])
                    </div>
                    {{-- <div class="uk-width-medium-1-1">
                        <label for="home_title">Button Text</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($home)?$home->first_section_button_text:''}}"
                            id="home_title"
                            name="first_section_button_text"/>
                        @include("layouts.partials.form-errors",['field'=>"first_section_button_text"])
                    </div>
                    <div class="uk-width-medium-1-1">
                        <label for="home_title">Button Link</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($home)?$home->first_section_button_link:''}}"
                            id="home_title"
                            name="first_section_button_link"/>
                        @include("layouts.partials.form-errors",['field'=>"first_section_button_link"])
                    </div> --}}
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
                        <label for="home_title">Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($home)?$home->second_section_title:''}}"
                            id="home_title"
                            name="second_section_title"/>
                        @include("layouts.partials.form-errors",['field'=>"second_section_title"])
                    </div>
                    <div class="uk-width-medium-1-1">
                        <label for="home_title">Sub Title</label>
                        <input class="md-input"
                            type="text"
                            value="{{isset($home)?$home->second_section_subtitle:''}}"
                            id="home_title"
                            name="second_section_subtitle"/>
                        @include("layouts.partials.form-errors",['field'=>"second_section_subtitle"])
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
