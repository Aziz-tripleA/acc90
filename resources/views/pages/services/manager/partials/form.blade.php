@csrf
<input type="hidden" name="is_featured" @isset($service) value="{{$service->is_featured}}"
        @else value="0" @endisset>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="brand_title">Name</label>
        <input class="md-input" type="text"
                @isset($service) value="{{isset($service)? $service->name :''}}"
                @endisset
                id="brand_title"
                name="name"/>
        @include("layouts.partials.form-errors",['field'=>"name"])
    </div>
    <div class="uk-width-medium-1-2">
        <label for="brand_title">Button Text</label>
        <input class="md-input"
                type="text"
                @isset($service) value="{{isset($service)? $service->button_text :''}}"
                @endisset
                id="brand_title"
                name="button_text"/>
        @include("layouts.partials.form-errors",['field'=>"button_text"])
    </div>
    <div class="uk-width-medium-1-2">
        <label for="brand_title">Button Link</label>
        <input class="md-input"
                type="text"
                @isset($service) value="{{isset($service)? $service->button_link :''}}"
                @endisset
                id="brand_title"
                name="button_link"/>
        @include("layouts.partials.form-errors",['field'=>"button_link"])
    </div>
    <div class="uk-width-medium-1-1">
        <label for="brand_image">Image</label>
        <input type="file" id="brand_image" name="cover" class="dropify"
                data-max-file-size="2M"
                @if(isset($service) && $service->getUrlFor('cover')) data-default-file="{{$service->getUrlFor('cover')}}" @endif/>
        @include("layouts.partials.form-errors",['field'=>"cover"])
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1" >
        <label for="page_content">Description </label>
        <textarea class="no_autosize tinymce" name="description"
                    id="page_content"
        >@isset($service) {{$service->description}} @endisset</textarea>
        @include("layouts.partials.form-errors",['field'=>"description"])
    </div>
</div>