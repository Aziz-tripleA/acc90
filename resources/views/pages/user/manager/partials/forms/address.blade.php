<form action="{{route('address.update',$address->id)}}" method="POST" class="ajax"
      id="Address{{$key}}">
    @csrf
    @method('PATCH')
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <h3 class="full_width_in_card heading_c">
        {{$address->info->title?:'Address #'.($key+1)}}
    </h3>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="user_edit_title_control">Title</label>
            <input class="md-input" value="{{$address->info->title}}"
                   type="text"
                   id="user_edit_title_control"
                   name="title"/>
            @include("layouts.partials.form-errors",['field'=>'title'])
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <label for="user_edit_street_address_control">Street Address</label>
            <input class="md-input" value="{{$address->info->street_address}}"
                   type="text"
                   id="user_edit_street_address_control"
                   name="street_address"/>
            @include("layouts.partials.form-errors",['field'=>'street_address'])
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-4">
            <label for="user_edit_building_number_control">Building number</label>
            <input class="md-input" value="{{$address->info->building_number}}"
                   type="text"
                   id="user_edit_building_number_control"
                   name="building_number"/>
            @include("layouts.partials.form-errors",['field'=>'building_number'])
        </div>
        <div class="uk-width-medium-1-4">
            <label for="user_edit_floor_number_control">Floor number</label>
            <input class="md-input" value="{{$address->info->floor_number}}" type="text"
                   id="user_edit_floor_number_control"
                   name="floor_number"/>
            @include("layouts.partials.form-errors",['field'=>'floor_number'])
        </div>
        <div class="uk-width-medium-1-4">
            <label for="user_edit_apartment_number_control">Apartment number</label>
            <input class="md-input" value="{{$address->info->apartment_number}}"
                   type="text"
                   id="user_edit_apartment_number_control"
                   name="apartment_number"/>
            @include("layouts.partials.form-errors",['field'=>'apartment_number'])
        </div>
        <div class="uk-width-medium-1-4">
            <label for="user_edit_postal_code_control">Postal Code</label>
            <input class="md-input" value="{{$address->info->postal_code}}"
                   type="text"
                   id="user_edit_postal_code_control"
                   name="postal_code"/>
            @include("layouts.partials.form-errors",['field'=>'postal_code'])
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2">
            <label for="user_edit_country">Country</label>
            <select id="user_edit_country" name="country" data-md-selectize>
                @foreach(['Country #1','Country #2','Country #3'] as $country)
                    <option value="{{$country}}">{{$country}}</option>
                @endforeach
            </select>
            @include("layouts.partials.form-errors",['field'=>'country'])
        </div>
        <div class="uk-width-medium-1-2">
            <label for="user_edit_city">City</label>
            <select id="user_edit_city" name="city" data-md-selectize>
                @foreach(['City #1','City #2','City #3'] as $city)
                    <option value="{{$city}}">{{$city}}</option>
                @endforeach
            </select>
            @include("layouts.partials.form-errors",['field'=>'city'])
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-3">
            <input name="default" type="checkbox" @if($address->default) checked @endif
            data-switchery id="user_edit_default"/>
            <label for="user_edit_default" class="inline-label">Default</label>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1 mt-20">
            <button class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                    type="submit">
                Save Changes
            </button>
        </div>
    </div>
</form>

