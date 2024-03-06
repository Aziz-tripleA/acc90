@csrf
<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Name</label>
            <input class="md-input"
                   type="text"
                   @isset($publisher) value="{{isset($publisher)? $publisher->publish_name :''}}"
                   @endisset
                   id="brand_title"
                   name="publish_name"/>
            @include("layouts.partials.form-errors",['field'=>"publish_name"])
        </div>

</div>
<div class="uk-grid" data-uk-grid-margin>

</div>
