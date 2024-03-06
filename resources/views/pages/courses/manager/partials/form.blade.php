@csrf
<input type="hidden" name="status_id" @isset($course) value="{{$course->status_id}}"
       @else value="{{$active_status}}" @endisset>
<div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input"
                   type="text"
                   @isset($course) value="{{isset($course)? $course->title :''}}"
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
                                @if(isset($course) && $course->topic_id == $topic->id) selected
                                @endif
                                value="{{$topic->id}}">{{$topic->title}}</option>
                    @endforeach
                </select>
                @include("layouts.partials.form-errors",['field'=>'topic_id'])
            </div>
            <div class="uk-width-medium-1-2">
                <label for="product_edit_type_control" class="uk-form-label">
                    Lecturer
                </label>
                <select id="product_edit_type_control" name="lecturer_id" data-md-selectize class="text-capitalize"
                        data-md-selectize-bottom>
                    <option value="">Select Lecturer</option>
                    @foreach($lecturers as $lecturer)
                        <option class="text-capitalize"
                                @if(isset($course) && $course->lecturer_id == $lecturer->id) selected
                                @endif
                                value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                    @endforeach
                </select>
                @include("layouts.partials.form-errors",['field'=>'lecturer_id'])
            </div>
        <div class="uk-width-large-1-1 uk-width-1-1">
            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <i class="uk-input-group-icon uk-icon-calendar"></i>
                                </span>
                <label for="uk_dp_start">Date</label>
                <input class="md-input" type="text" name="date" autocomplete="off"
                       @isset($course) value="{{$course->date}}" @endisset
                       id="uk_dp_start">
                @include("layouts.partials.form-errors",['field'=>"date"])
            </div>
        </div>
        <div class="uk-width-medium-1-1">
            <label for="brand_image">Image</label>
            <input type="file" id="brand_image" name="cover" class="dropify"
                   data-max-file-size="2M"
                   @if(isset($course) && $course->getUrlFor('cover')) data-default-file="{{$course->getUrlFor('cover')}}" @endif/>
            @include("layouts.partials.form-errors",['field'=>"cover"])
        </div>
</div>
<div class="uk-grid" data-uk-grid-margin>

    <div class="uk-width-medium-1-2">
        <label for="product_edit_type_control" class="uk-form-label">
            Type
        </label>
        <select id="product_edit_type_control" name="type" data-md-selectize class="text-capitalize type"
                data-md-selectize-bottom>
            <option value="">Select Type</option>
            @foreach(['text','video','audio'] as $type)
                <option class="text-capitalize"
                        @if(isset($course) && $course->type == $type) selected
                        @endif
                        value="{{$type}}">{{$type}}</option>
            @endforeach
        </select>
        @include("layouts.partials.form-errors",['field'=>'type'])
    </div>
</div>
<div class="uk-grid audio text video box" style="display:block" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="page_content">Content </label>
        <textarea class="no_autosize tinymce" name="content"
                  id="page_content"
        >@if(isset($course)){{$course->content}}@endif</textarea>
        @include("layouts.partials.form-errors",['field'=>"content"])
    </div>
</div>
<div class="uk-grid text box" style="display:none" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="brand_image">PDF file</label>
        <input type="file" id="brand_image" name="pdf_file" class="dropify"
            {{-- data-max-file-size="2M" --}}
            @if(isset($course) && $course->getUrlFor('pdf_file')) data-default-file="{{$course->getUrlFor('pdf_file')}}" @endif/>
        @include("layouts.partials.form-errors",['field'=>"pdf_file"])
    </div>
</div>
<div class="uk-grid box" style="display:none" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="page_content">Audio Content</label>
        <textarea class="no_autosize tinymce" name="audio_url"
                  id="page_content"
        >@if(isset($course)){{$course->audio_url}}@endif</textarea>
        @include("layouts.partials.form-errors",['field'=>"audio_url"])
    </div>
</div>
<div class="uk-grid video box" data-uk-grid-margin style="display:none">
    <div class="uk-width-medium-1-1">
        <label for="page_content">Video url </label>
        <input class="md-input"
               type="text"
               @isset($course) value="{{isset($course)? $course->video_url :''}}"
               @endisset
               name="video_url"/>
        @include("layouts.partials.form-errors",['field'=>"video_url"])
    </div>
</div>



