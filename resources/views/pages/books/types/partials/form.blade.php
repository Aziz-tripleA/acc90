@csrf
<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Name</label>
            <input class="md-input"
                   type="text"
                   @isset($bookType) value="{{isset($bookType)? $bookType->type_name :''}}"
                   @endisset
                   id="brand_title"
                   name="type_name"/>
            @include("layouts.partials.form-errors",['field'=>"type_name"])
        </div>

</div>
<div class="uk-grid" data-uk-grid-margin>

</div>
