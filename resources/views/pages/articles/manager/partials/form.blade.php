@csrf
    <input type="hidden" name="status_id" @isset($article) value="{{$article->status_id}}"
        @else value="{{$active_status}}" @endisset>
    
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input"
                   type="text"
                   @isset($article) value="{{isset($article)? $article->title :''}}"
                   @endisset
                   id="brand_title"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>"title"])
        </div>

        <div class="uk-width-medium-1-2">
            <label for="product_edit_type_control" class="uk-form-label">
                Topic
            </label>
            <select id="product_edit_type_control" name="topic_id" data-md-selectize class="text-capitalize"
                    data-md-selectize-bottom>
                <option value="">Select Topic</option>
                @foreach($topics as $topic)
                    <option class="text-capitalize"
                            @if(isset($article) && $article->topic_id == $topic->id) selected
                            @endif
                            value="{{$topic->id}}">{{$topic->title}}</option>
                @endforeach
            </select>
            @include("layouts.partials.form-errors",['field'=>'topic_id'])
        </div>
        <div class="uk-width-medium-1-2">
            <label for="product_edit_type_control" class="uk-form-label">
                Writer
            </label>
            <select id="product_edit_type_control" name="writer_id" data-md-selectize class="text-capitalize"
                    data-md-selectize-bottom>
                <option value="">Select Writer</option>
                @foreach($writers as $writer)
                    <option class="text-capitalize"
                            @if(isset($article) && $article->writer_id == $writer->id) selected
                            @endif
                            value="{{$writer->id}}">{{$writer->name}}</option>
                @endforeach
            </select>
            @include("layouts.partials.form-errors",['field'=>'writer_id'])
        </div>
        <div class="uk-width-large-1-1 uk-width-1-1">
            <div class="uk-input-group">
                <span class="uk-input-group-addon">
                    <i class="uk-input-group-icon uk-icon-calendar"></i>
                </span>
                <label for="uk_dp_start">Date</label>
                <input class="md-input" type="text" name="date" autocomplete="off"
                       @isset($article) value="{{$article->date}}" @endisset
                       id="uk_dp_start">
                @include("layouts.partials.form-errors",['field'=>"date"])
            </div>
        </div>
        <div class="uk-width-medium-1-1">
            <label for="brand_image">Image</label>
            <input type="file" id="brand_image" name="cover" class="dropify"
                   data-max-file-size="2M"
                   @if(isset($article) && $article->getUrlFor('cover')) data-default-file="{{$article->getUrlFor('cover')}}" @endif/>
            @include("layouts.partials.form-errors",['field'=>"cover"])
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="page_content">Intro Text</label>
            <textarea class="no_autosize tinymce" name="introtext"
                    id="page_content"
            >@if(isset($article)){{$article->introtext}}@endif</textarea>
            @include("layouts.partials.form-errors",['field'=>"introtext"])
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="page_content">Full Text</label>
            <textarea class="no_autosize tinymce" name="fulltext"
                    id="page_content"
            >@if(isset($article)){{$article->fulltext}}@endif</textarea>
            @include("layouts.partials.form-errors",['field'=>"fulltext"])
        </div>
    </div>
