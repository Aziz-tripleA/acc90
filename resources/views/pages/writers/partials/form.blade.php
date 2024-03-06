@csrf
<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Name</label>
            <input class="md-input"
                   type="text"
                   @isset($writer) value="{{isset($writer)? $writer->name :''}}"
                   @endisset
                   id="brand_title"
                   name="name"/>
            @include("layouts.partials.form-errors",['field'=>"name"])
        </div>

</div>
<div class="uk-grid" data-uk-grid-margin>

</div>
