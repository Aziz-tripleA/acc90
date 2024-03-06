@csrf
<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Name</label>
            <input class="md-input"
                   type="text"
                   @isset($translator) value="{{isset($translator)? $translator->translator_name :''}}"
                   @endisset
                   id="brand_title"
                   name="translator_name"/>
            @include("layouts.partials.form-errors",['field'=>"translator_name"])
        </div>

</div>
<div class="uk-grid" data-uk-grid-margin>

</div>
