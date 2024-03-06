@csrf
    <input type="hidden" name="status_id" @isset($employee) value="{{$employee->status_id}}"
        @else value="{{$active_status}}" @endisset>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Name</label>
            <input class="md-input"
                    type="text"
                    @isset($employee) value="{{isset($employee)? $employee->name :''}}"
                    @endisset
                    id="brand_title"
                    name="name"/>
            @include("layouts.partials.form-errors",['field'=>"name"])
        </div>        
    </div> 
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Position</label>
            <input class="md-input"
                   type="text"
                   @isset($employee) value="{{isset($employee)? $employee->position :''}}"
                   @endisset
                   id="brand_title"
                   name="position"/>
            @include("layouts.partials.form-errors",['field'=>"position"])
        </div> 
        <div class="uk-width-medium-1-1">
            <label for="brand_image">Image</label>
            <input type="file" id="brand_image" name="cover" class="dropify"
                   data-max-file-size="2M"
                   @if(isset($employee) && $employee->getUrlFor('cover')) data-default-file="{{$employee->getUrlFor('cover')}}" @endif/>
            @include("layouts.partials.form-errors",['field'=>"cover"])
        </div>  
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="page_content">Bio</label>
            <textarea class="no_autosize tinymce" name="bio"
                    id="page_content"
            >@if(isset($employee)){{$employee->bio}}@endif</textarea>
            @include("layouts.partials.form-errors",['field'=>"bio"])
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="page_content">Description</label>
            <textarea class="no_autosize tinymce" name="description"
                    id="page_content"
            >@if(isset($employee)){{$employee->description}}@endif</textarea>
            @include("layouts.partials.form-errors",['field'=>"description"])
        </div>
    </div>