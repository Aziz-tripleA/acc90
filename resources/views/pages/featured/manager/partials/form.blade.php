@csrf
<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input" disabled
                   type="text"
                   @isset($featured) value="{{isset($featured)? $featured->title :''}}"
                   @endisset
                   id="brand_title"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>"title"])
        </div>

        <div class="uk-width-medium-1-1">
            <label for="brand_image">Image</label>
            <input type="file" id="brand_image" name="cover" class="dropify"
                   data-max-file-size="2M"
                   @if(isset($featured) && $featured->getUrlFor('cover')) data-default-file="{{$featured->getUrlFor('cover')}}" @endif/>
            @include("layouts.partials.form-errors",['field'=>"cover"])
        </div>
</div>




