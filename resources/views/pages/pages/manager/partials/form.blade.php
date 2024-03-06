@csrf
<div class="uk-grid" data-uk-grid-margin>
    @foreach($locales as $key=>$locale)
        <div class="uk-width-medium-1-1" data-locale="{{$key}}">
            <label for="page_title{{$key}}">Title [{{$locale['name']}}]</label>
            <input class="md-input"
                   type="text"
                   value="{{$page->getTranslationWithoutFallback('title',$key)}}"
                   id="page_title"
                   name="title[{{$key}}]"/>
            @include("layouts.partials.form-errors",['field'=>"title.$key"])
        </div>
    @endforeach
</div>
<div class="uk-grid" data-uk-grid-margin>
    @foreach($locales as $key=>$locale)
        <div class="uk-width-medium-1-1" data-locale="{{$key}}">
            <label for="page_content{{$key}}">Content [{{$locale['name']}}]</label>
            <textarea class="no_autosize tinymce" name="content[{{$key}}]"
                      id="page_content{{$key}}"
            >{{$page->getTranslationWithoutFallback('content',$key)}}</textarea>
            @include("layouts.partials.form-errors",['field'=>"content.$key"])
        </div>
    @endforeach
</div>