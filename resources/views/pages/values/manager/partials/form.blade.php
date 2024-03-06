@csrf
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="brand_title">Name</label>
        <input class="md-input"
                type="text"
                @isset($value) value="{{isset($value)? $value->name :''}}"
                @endisset
                id="brand_title"
                name="name"/>
        @include("layouts.partials.form-errors",['field'=>"name"])
    </div>
    
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1" >
        <label for="page_content">Description </label>
        <textarea class="no_autosize tinymce" name="description"
                    id="page_content"
        >@isset($value) {{$value->description}} @endisset</textarea>
        @include("layouts.partials.form-errors",['field'=>"description"])
    </div>
</div>