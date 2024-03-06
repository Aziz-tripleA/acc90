@csrf
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Type</label>
            <input class="md-input"
                   type="text"
                   @isset($counselingType) value="{{isset($counselingType)? $counselingType->type :''}}"
                   @endisset
                   id="brand_title"
                   name="type"/>
            @include("layouts.partials.form-errors",['field'=>"type"])
        </div>

        <div class="uk-width-medium-1-1">
            <label for="brand_image">File</label>
            <input type="file" id="brand_image" name="form" class="dropify"
                   data-max-file-size="20M"
                   @if(isset($counselingType) && $counselingType->getUrlFor('form')) data-default-file="{{$counselingType->getUrlFor('form')}}" @endif/>
            @include("layouts.partials.form-errors",['field'=>"form"])
        </div>
       

    </div>
    
