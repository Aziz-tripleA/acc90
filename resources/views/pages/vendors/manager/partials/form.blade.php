@csrf
<div class="uk-grid" data-uk-grid-margin>
    @foreach($locales as $key=>$locale)
        <div class="uk-width-medium-1-1" data-locale="{{$key}}">
            <label for="vendor_title">Name [{{$locale['name']}}]</label>
            <input class="md-input"
                   type="text"
                   @isset($vendor) value="{{isset($vendor)? $vendor->getTranslationWithoutFallback('name',$key) :''}}"
                   @endisset
                   id="vendor_title"
                   name="name[{{$key}}]"/>
            @include("layouts.partials.form-errors",['field'=>"name.$key"])
        </div>
    @endforeach
</div>