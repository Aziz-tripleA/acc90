@csrf
<input type="hidden" name="contact[{{$key}}][id]" value="{{$contact->id}}">
<div class="uk-form-row mb-20">

    <label for="contact{{$key}}" class="uk-form-label">
        {{$contact->label}}
    </label>
    <input class="md-input"
           type="text"
           value="{{$contact->value}}"
           id="contact{{$key}}"
           name="contact[{{$key}}][value]"/>
</div>