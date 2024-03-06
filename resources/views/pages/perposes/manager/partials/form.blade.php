@csrf
    <input type="hidden" name="status_id" @isset($perpos) value="{{$perpos->status_id}}"
        @else value="{{$active_status}}" @endisset>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input"
                   type="text"
                   @isset($perpos) value="{{isset($perpos)? $perpos->title :''}}"
                   @endisset
                   id="brand_title"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>"title"])
        </div>

        <div class="uk-width-medium-1-1">
            <label for="brand_image">Image</label>
            <input type="file" id="brand_image" name="cover" class="dropify"
                   data-max-file-size="2M"
                   @if(isset($perpos) && $perpos->getUrlFor('cover')) data-default-file="{{$perpos->getUrlFor('cover')}}" @endif/>
            @include("layouts.partials.form-errors",['field'=>"cover"])
        </div>  
         
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="page_content">Text</label>
            <textarea class="no_autosize tinymce" name="text"
                    id="page_content"
            >@if(isset($perpos)){{$perpos->text}}@endif</textarea>
            @include("layouts.partials.form-errors",['field'=>"text"])
        </div>
    </div>
    
