@csrf
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-2">
        <label for="user_edit_uname_control">First Name</label>
        <input class="md-input" value="{{isset($user)?$user->first_name:''}}" type="text"
               id="user_edit_uname_control"
               name="first_name"/>
        @include('layouts.partials.form-errors',['field'=>"first_name"])
    </div>
    <div class="uk-width-medium-1-2">
        <label for="user_edit_position_control">Last Name</label>
        <input class="md-input" value="{{isset($user)?$user->last_name:''}}" type="text"
               id="user_edit_position_control"
               name="last_name"/>
        @include('layouts.partials.form-errors',['field'=>"last_name"])
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-2">
        <label for="user_edit_email_control">Email</label>
        <input class="md-input" value="{{isset($user)?$user->email:''}}" type="text"
               id="user_edit_email_control"
               name="email"/>
        @include('layouts.partials.form-errors',['field'=>"email"])
    </div>
    <div class="uk-width-medium-1-2">
        <label for="user_edit_mobile_control">Mobile</label>
        <input class="md-input" value="{{isset($user)?$user->mobile:''}}" type="text"
               id="user_edit_mobile_control"
               name="mobile"/>
        @include('layouts.partials.form-errors',['field'=>"mobile"])
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-2">
        <label for="user_edit_password_control">Password</label>
        <input class="md-input" type="password"
               id="user_edit_password_control"
               name="password"/>
        @include('layouts.partials.form-errors',['field'=>"password"])
    </div>
    <div class="uk-width-medium-1-2">
        <label for="user_edit_password_confirmation_control">Password
            Confirmation</label>
        <input class="md-input" type="password"
               id="user_edit_password_confirmation_control"
               name="password_confirmation"/>
        @include('layouts.partials.form-errors',['field'=>"password_confirmation"])
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="product_edit_manufacturer_control" class="uk-form-label">
            Role
        </label>
        <select id="product_edit_manufacturer_control" name="role_id" data-md-selectize
                data-md-selectize-bottom>
            <option value="">Select Role</option>
            @foreach($roles as $role)
                <option @if(isset($user) && $user->hasRole($role->name)) selected
                        @endif value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        @include("layouts.partials.form-errors",['field'=>'role_id'])
    </div>
</div>
