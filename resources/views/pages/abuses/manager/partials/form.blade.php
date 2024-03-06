@csrf
    <input type="hidden" name="status_id" @isset($abuse) value="{{$abuse->status_id}}"
        @else value="{{$active_status}}" @endisset>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Number</label>
            <input class="md-input"
                   type="text"
                   @isset($abuse) value="{{isset($abuse)? $abuse->number :''}}"
                   @endisset
                   id="brand_title"
                   name="number"/>
            @include("layouts.partials.form-errors",['field'=>"number"])
        </div>        
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input"
                   type="text"
                   @isset($abuse) value="{{isset($abuse)? $abuse->title :''}}"
                   @endisset
                   id="brand_title"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>"title"])
        </div>        
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="page_content">Text</label>
            <textarea class="no_autosize tinymce" name="text"
                    id="page_content"
            >@if(isset($abuse)){{$abuse->text}}@endif</textarea>
            @include("layouts.partials.form-errors",['field'=>"text"])
        </div>
    </div>
    
