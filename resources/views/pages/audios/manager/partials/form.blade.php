@csrf
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="brand_title">Title</label>
            <input class="md-input"
                   type="text"
                   @isset($audio) value="{{isset($audio)? $audio->title :''}}"
                   @endisset
                   id="brand_title"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>"title"])
        </div>

        <div class="uk-width-medium-1-1">
            <label for="brand_image">File</label>
            <input type="file" id="brand_image" name="audio_file" class="dropify"
                   data-max-file-size="20M"
                   @if(isset($audio) && $audio->getUrlFor('file')) data-default-file="{{$audio->getUrlFor('file')}}" @endif/>
            @include("layouts.partials.form-errors",['field'=>"audio_file"])
        </div>
        <div class="uk-width-medium-1-1">
            @if(isset($audio) && $audio->getUrlFor('file')) 
                <audio style="height:50px" controls>
                    <source src="{{$audio->getUrlFor('file')}}" type="audio/mp3">
                </audio> 
                <input class="md-input" type="text" disabled value="{{$audio->getUrlFor('file')}}" />
            @endif

        </div>

    </div>
    
