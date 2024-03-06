@csrf
    <input type="hidden" name="status_id" @isset($announcement) value="{{$announcement->status_id}}"
        @else value="{{$active_status}}" @endisset>
    <input type="hidden" name="is_featured" @isset($announcement) value="{{$announcement->is_featured}}"
        @else value="0" @endisset>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input"
                   type="text"
                   @isset($announcement) value="{{isset($announcement)? $announcement->title :''}}"
                   @endisset
                   id="brand_title"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>"title"])
        </div>

        
        <div class="uk-width-large-1-1 uk-width-1-1">
            <div class="uk-input-group">
                <span class="uk-input-group-addon">
                    <i class="uk-input-group-icon uk-icon-calendar"></i>
                </span>
                <label for="uk_dp_start">Date</label>
                <input class="md-input" type="text" name="date" autocomplete="off"
                       @isset($announcement) value="{{$announcement->date}}" @endisset
                       id="uk_dp_start">
                @include("layouts.partials.form-errors",['field'=>"date"])
            </div>
        </div>
        <div class="uk-width-medium-1-1">
            <label for="brand_image">Image</label>
            <input type="file" id="brand_image" name="cover" class="dropify"
                    data-max-file-size="2M"
                    @if(isset($announcement) && $announcement->getUrlFor('cover')) data-default-file="{{$announcement->getUrlFor('cover')}}" @endif/>
            @include("layouts.partials.form-errors",['field'=>"cover"])
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="page_content">Text</label>
            <textarea class="no_autosize tinymce" name="description"
                    id="page_content"
            >@if(isset($announcement)){{$announcement->description}}@endif</textarea>
            @include("layouts.partials.form-errors",['field'=>"description"])
        </div>
    </div>
    
