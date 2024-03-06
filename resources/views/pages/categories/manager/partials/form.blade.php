@csrf
<input type="hidden" name="status_id" @isset($category) value="{{$category->status_id}}" @endisset>
<div class="uk-grid" data-uk-grid-margin>
    @foreach($locales as $key=>$locale)
        <div class="uk-width-medium-1-1" data-locale="{{$key}}">
            <label for="category_title">Name [{{$locale['name']}}]</label>
            <input class="md-input"
                   type="text"
                   @isset($category) value="{{isset($category)? $category->getTranslationWithoutFallback('name',$key) :''}}"
                   @endisset
                   id="category_title"
                   name="name[{{$key}}]"/>
            @include("layouts.partials.form-errors",['field'=>"name.$key"])
        </div>
    @endforeach
</div>
<div class="uk-grid" data-uk-grid-margin>
    @foreach($locales as $key=>$locale)
        <div class="uk-width-medium-1-1" data-locale="{{$key}}">
            <label for="category_description">Description [{{$locale['name']}}]</label>
            <textarea cols="30" rows="2" name="description[{{$key}}]" id="category_description"
                      class="md-input no_autosize">{{isset($category)? $category->getTranslationWithoutFallback('description',$key) :''}}</textarea>
            @include("layouts.partials.form-errors",['field'=>"description.$key"])
        </div>
    @endforeach
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="category_order">Order</label>
        <input class="md-input"
               type="number"
               @isset($category) value="{{$category->sort_order}}"
               @endisset
               id="category_order"
               name="sort_order"/>
        @include("layouts.partials.form-errors",['field'=>'sort_order'])
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="category_parent">Parent Category</label>
        <select id="category_parent" name="parent_id" data-md-selectize data-md-selectize-bottom>
            <option value="">Select Parent Category</option>
            @foreach($categories as $item)
                <option
                        @if(isset($category) && $category->parent_id == $item->id) selected @endif
                value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        @include("layouts.partials.form-errors",['field'=>'parent_id'])
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="category_badge">Category Image</label>
        <br>
        <br>
        <div class="user_heading_avatar fileinput fileinput-new"
             data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                @if(isset($category) && $category->badge)
                    <img src="{{$category->getUrlFor('badge')}}"
                         alt="category badge"/>
                @endif
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail">
            </div>
            <div class="user_avatar_controls">
                <span class="btn-file">
                <span class="fileinput-new">
                <i class="material-icons">&#xE2C6;</i>
                </span>
                <span class="fileinput-exists">
                <i class="material-icons">&#xE86A;</i>
                </span>
                <input type="file" name="badge"
                       id="category_badge">
                </span>
                <a href="#" class="btn-file fileinput-exists"
                   data-dismiss="fileinput">
                    <i class="material-icons">&#xE5CD;</i>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        @include('layouts.partials.form-errors',['field'=>"badge"])
    </div>
</div>
