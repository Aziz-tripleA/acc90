@csrf
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <label for="role_title">Role Name</label>
        <input class="md-input"
               type="text"
               @isset($role) value="{{isset($role)? $role->display_name :''}}"
               @endisset
               id="role_title"
               name="display_name"/>
        @include("layouts.partials.form-errors",['field'=>"display_name"])
    </div>
</div>
<h3 class="full_width_in_card heading_c uk-margin-bottom">
    Permissions
</h3>
<div class="uk-accordion" data-uk-accordion="">
    @foreach($permissions as $key=>$perms)
        <h3 class="uk-accordion-title">{{$key}}</h3>
        <div data-wrapper="true"
             @if($key != 'dashboard') style="overflow:hidden;height:0;position:relative;"
             @endif aria-expanded="false">
            <div class="uk-accordion-content">
                @foreach($perms as $perm)
                    <div>
                        <input type="checkbox" name="permissions[]"
                               @if(isset($role) && in_array($perm->id,$role->perms->pluck('id')->toArray())) checked
                               @endif value="{{$perm->id}}" id="customCheck{{$perm->name}}">
                        <label for="customCheck{{$perm->name}}">
                            {{$perm->display_name}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
