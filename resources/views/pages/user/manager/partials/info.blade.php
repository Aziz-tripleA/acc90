<div>
    <div class="md-card md-card-hover">
        <div class="md-card-head">
            <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
                <i class="md-icon material-icons">&#xE5D4;</i>
                <div class="uk-dropdown uk-dropdown-small">
                    <ul class="uk-nav">
                        @permission('edit_customers')
                        <li><a href="{{route('user.admin.edit',$user->id)}}">Edit</a></li>
                        @endpermission
                        @permission('delete_customers')
                        <li><a class="confirm-action-button"
                               data-uk-modal="{target:'#confirmationModal'}"
                               data-action="{{route('user.admin.destroy',$user->id)}}"
                               data-custom_method='@method('DELETE')'
                               href="#">Remove</a></li>
                        @endpermission
                    </ul>
                </div>
            </div>
            <div class="uk-text-center">
                <img class="md-card-head-avatar" src="{{$user->getUrlFor('avatar')?:$adminAvatarDef}}" alt="avatar"/>
            </div>
            <h3 class="md-card-head-text uk-text-center">
                {{$user->full_name}}
                <span class="uk-text-truncate uk-text-{{$user->status->color}}">{{$user->status->title}}</span>
            </h3>
        </div>
        <div class="md-card-content">
            <ul class="md-list">
                <li>
                    <div class="md-list-content">
                        <span class="md-list-heading">Email</span>
                        <span class="uk-text-small uk-text-muted uk-text-truncate">{{$user->email}}</span>
                    </div>
                </li>
                <li>
                    <div class="md-list-content">
                        <span class="md-list-heading">Phone</span>
                        <span class="uk-text-small uk-text-muted">{{$user->mobile}}</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
