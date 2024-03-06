<form action="{{route('user.update',$user->id)}}" enctype="multipart/form-data" class="ajax"
      method="POST" id="BasicInfo">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status_id" value="{{$user->status->id}}">
    <div class="uk-margin-top">
        <h3 class="full_width_in_card heading_c">
            General info
        </h3>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <label for="user_edit_uname_control">First Name</label>
                <input class="md-input" value="{{$user->first_name}}" type="text"
                       id="user_edit_uname_control"
                       name="first_name"/>
                @include('layouts.partials.form-errors',['field'=>"first_name"])
            </div>
            <div class="uk-width-medium-1-2">
                <label for="user_edit_position_control">Last Name</label>
                <input class="md-input" value="{{$user->last_name}}" type="text"
                       id="user_edit_position_control"
                       name="last_name"/>
                @include('layouts.partials.form-errors',['field'=>"last_name"])
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

        <h3 class="full_width_in_card heading_c">
            Contact info
        </h3>
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2"
                     data-uk-grid-margin>
                    <div>
                        <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                         </span>
                            <label>Email</label>
                            <input type="text" class="md-input" name="email"
                                   value="{{$user->email}}"/>
                            @include('layouts.partials.form-errors',['field'=>"email"])
                        </div>
                    </div>
                    <div>
                        <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                        </span>
                            <label>Mobile</label>
                            <input type="text" class="md-input" name="mobile"
                                   value="{{$user->mobile}}"/>
                            @include('layouts.partials.form-errors',['field'=>"mobile"])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="full_width_in_card heading_c">
            Verification
        </h3>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <div>
                    <input type="checkbox" name="email_verified" @if($user->hasVerifiedEmail()) checked @endif value="1" id="customCheckEmail">
                    <label for="customCheckEmail">
                        Email Verified
                    </label>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div>
                    <input type="checkbox" name="mobile_verified" @if($user->hasVerifiedMobile()) checked @endif value="1" id="customCheckMobile">
                    <label for="customCheckMobile">
                        Mobile Verified
                    </label>
                </div>
            </div>
        </div>
        {{--<h3 class="full_width_in_card heading_c">--}}
        {{--Avatar--}}
        {{--</h3>--}}
        {{--<div class="uk-grid" data-uk-grid-margin>--}}
        {{--<div class="uk-width-medium-1-1">--}}
        {{--<div class="user_heading_avatar fileinput fileinput-new"--}}
        {{--data-provides="fileinput">--}}
        {{--<div class="fileinput-new thumbnail">--}}
        {{--<img src="{{$user->getUrlFor('avatar')?:$adminAvatarDef}}"--}}
        {{--alt="user avatar"/>--}}
        {{--</div>--}}
        {{--<div class="fileinput-preview fileinput-exists thumbnail">--}}
        {{--</div>--}}
        {{--<div class="user_avatar_controls">--}}
        {{--<span class="btn-file">--}}
        {{--<span class="fileinput-new">--}}
        {{--<i class="material-icons">&#xE2C6;</i>--}}
        {{--</span>--}}
        {{--<span class="fileinput-exists">--}}
        {{--<i class="material-icons">&#xE86A;</i>--}}
        {{--</span>--}}
        {{--<input type="file" name="avatar"--}}
        {{--id="user_edit_avatar_control">--}}
        {{--</span>--}}
        {{--<a href="#" class="btn-file fileinput-exists"--}}
        {{--data-dismiss="fileinput">--}}
        {{--<i class="material-icons">&#xE5CD;</i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--@include('layouts.partials.form-errors',['field'=>"avatar"])--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1 mt-20">
                <button class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                        type="submit">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</form>
