@csrf
<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input"
                   type="text"
                   @isset($topic) value="{{isset($topic)? $topic->title :''}}"
                   @endisset
                   id="brand_title"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>"title"])
        </div>

</div>
<div class="uk-width-medium-1-2">
    <label for="product_edit_type_control" class="uk-form-label">
        Type
    </label>
    <select id="product_edit_type_control" name="type" data-md-selectize class="text-capitalize"
            data-md-selectize-bottom>
        <option value="">Select Type</option>
        @foreach(['article','course'] as $type)
            <option class="text-capitalize"
                    @if(isset($topic) && $topic->type == $type) selected
                    @endif
                    value="{{$type}}">{{$type}}</option>
        @endforeach
    </select>
    @include("layouts.partials.form-errors",['field'=>'type'])
</div>
