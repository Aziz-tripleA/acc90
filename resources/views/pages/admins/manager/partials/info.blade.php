<tr>
    <td>{{$user->full_name}}</td>
    <td>{{$user->role?$user->role->name:''}}</td>
    <td>
        <a href="{{route('management.admin.user.edit',$user->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('management.admin.user.destroy',$user->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
    </td>
</tr>
