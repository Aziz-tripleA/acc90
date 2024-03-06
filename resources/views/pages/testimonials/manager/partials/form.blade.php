@csrf
    <input type="hidden" name="status_id" @isset($testimonial) value="{{$testimonial->status_id}}"
        @else value="{{$active_status}}" @endisset>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Name</label>
            <input class="md-input"
                   type="text"
                   @isset($testimonial) value="{{isset($testimonial)? $testimonial->title :''}}"
                   @endisset
                   id="brand_title"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>"title"])
        </div>
    </div>
   
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="page_content">Text</label>
            <textarea class="no_autosize tinymce" name="description"
                    id="page_content"
            >@if(isset($testimonial)){{$testimonial->description}}@endif</textarea>
            @include("layouts.partials.form-errors",['field'=>"description"])
        </div>
    </div>
