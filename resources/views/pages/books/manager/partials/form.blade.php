@csrf
<input type="hidden" name="status_id" @isset($book) value="{{$book->status_id}}"
       @else value="{{$active_status}}" @endisset>
<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input"
                   type="text"
                   @isset($book) value="{{isset($book)? $book->item_name :''}}"
                   @endisset
                   id="brand_title"
                   name="item_name"/>
            @include("layouts.partials.form-errors",['field'=>"item_name"])
        </div>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Book Code</label>
            <input class="md-input"
                   type="text"
                   @isset($book) value="{{isset($book)? $book->item_code :''}}"
                   @endisset
                   id="brand_title"
                   name="item_code"/>
            @include("layouts.partials.form-errors",['field'=>"item_code"])
        </div>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Book Size</label>
            <input class="md-input"
                   type="text"
                   @isset($book) value="{{isset($book)? $book->item_size :''}}"
                   @endisset
                   id="brand_title"
                   name="item_size"/>
            @include("layouts.partials.form-errors",['field'=>"item_size"])
        </div>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Book Copies</label>
            <input class="md-input"
                   type="text"
                   @isset($book) value="{{isset($book)? $book->item_copies :''}}"
                   @endisset
                   id="brand_title"
                   name="item_copies"/>
            @include("layouts.partials.form-errors",['field'=>"item_copies"])
        </div>

            <div class="uk-width-medium-1-2">
                <label for="product_edit_type_control" class="uk-form-label">
                    Type
                </label>
                <select id="product_edit_type_control" name="type_id" data-md-selectize class="text-capitalize"
                        data-md-selectize-bottom>
                    <option value="">Select Type</option>
                    @foreach($types as $type)
                        <option class="text-capitalize"
                                @if(isset($book) && $book->type_id == $type->id) selected
                                @endif
                                value="{{$type->id}}">{{$type->type_name}}</option>
                    @endforeach
                </select>
                @include("layouts.partials.form-errors",['field'=>'type_id'])
            </div>
            
            <div class="uk-width-medium-1-2">
                <label for="category" class="uk-form-label">
                    Category
                </label>
                <select id="category" name="cat_id" data-md-selectize data-md-selectize-bottom class="text-capitalize">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option class="text-capitalize"
                                @if(isset($book) && $book->cat_id == $category->id) selected
                                @endif
                                value="{{$category->id}}">{{$category->cat_name}}</option>
                    @endforeach
                </select>
                @include("layouts.partials.form-errors",['field'=>'cat_id'])
            </div>
            <div class="uk-width-medium-1-2">
                <label for="author" class="uk-form-label">
                    Author
                </label>
                <select id="author" name="author_id" data-md-selectize data-md-selectize-bottom class="text-capitalize">
                    <option value="">Select Author</option>
                    @foreach($authors as $author)
                        <option class="text-capitalize"
                                @if(isset($book) && $book->author_id == $author->id) selected
                                @endif
                                value="{{$author->id}}">{{$author->author_name}}</option>
                    @endforeach
                </select>
                @include("layouts.partials.form-errors",['field'=>'author_id'])
            </div>
            <div class="uk-width-medium-1-2">
                <label for="publisher" class="uk-form-label">
                    Publisher
                </label>
                <select id="publisher" name="publish_id"  data-md-selectize data-md-selectize-bottom class="text-capitalize">
                    <option value="">Select Publisher</option>
                    @foreach($publishers as $publisher)
                        <option class="text-capitalize"
                                @if(isset($book) && $book->publish_id == $publisher->id) selected
                                @endif
                                value="{{$publisher->id}}">{{$publisher->publish_name}}</option>
                    @endforeach
                </select>
                @include("layouts.partials.form-errors",['field'=>'publish_id'])
            </div>
            <div class="uk-width-medium-1-2">
                <label for="translator" class="uk-form-label">
                    Translator
                </label>
                <select id="translator" name="translator_id" data-md-selectize data-md-selectize-bottom class="text-capitalize" >
                    <option value="">Select Translator</option>
                    @foreach($translators as $translator)
                        <option class="text-capitalize"
                                @if(isset($book) && $book->translator_id == $translator->id) selected
                                @endif
                                value="{{$translator->id}}">{{$translator->translator_name}}</option>
                    @endforeach
                </select>
                @include("layouts.partials.form-errors",['field'=>'translator_id'])
            </div>
        <div class="uk-width-large-1-1 uk-width-1-1">
            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <i class="uk-input-group-icon uk-icon-calendar"></i>
                                </span>
                <label for="uk_dp_start">Publish Date</label>
                <input class="md-input" type="text" name="pub_date" autocomplete="off"
                       @isset($book) value="{{$book->pub_date}}" @endisset
                       >
                @include("layouts.partials.form-errors",['field'=>"pub_date"])
            </div>
        </div>
        <div class="uk-width-medium-1-1">
            <label for="brand_image">Image</label>
            <input type="file" id="brand_image" name="cover" class="dropify"
                   data-max-file-size="2M"
                   @if(isset($book) && $book->getUrlFor('cover')) data-default-file="{{$book->getUrlFor('cover')}}" 
                   @elseif(isset($book)) data-default-file="{{$book->l_img}}"
                   @endif/>
            @include("layouts.partials.form-errors",['field'=>"cover"])
        </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="page_content">Book Details </label>
        <textarea class="no_autosize tinymce" name="book_details"
                  id="page_content"
        >@if(isset($book)){{$book->book_details}}@endif</textarea>
        @include("layouts.partials.form-errors",['field'=>"book_details"])
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="page_index">Book Index </label>
        <textarea class="no_autosize tinymce" name="book_index"
                  id="page_index"
        >@if(isset($book)){{$book->book_index}}@endif</textarea>
        @include("layouts.partials.form-errors",['field'=>"book_index"])
    </div>
</div>
