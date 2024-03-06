@csrf
<input type="hidden" name="config[{{$key}}][id]" value="{{$configuration->id}}">
<div class="uk-form-row mb-20">

    <label for="config{{$key}}" class="uk-form-label">
        {{$configuration->label}}
    </label>
    <input class="md-input"
           type="text"
           value="{{$configuration->value}}"
           id="config{{$key}}"
           name="config[{{$key}}][value]"/>
</div>