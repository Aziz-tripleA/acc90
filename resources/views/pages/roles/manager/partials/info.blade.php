<tr>
    <td>{{$role->display_name}}</td>
    <td>{{$role->users()->count()}}</td>
    <td>
        @permission('edit_roles')
        <a href="{{route('management.admin.role.edit',$role->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endpermission
        @permission('delete_roles')
        @if($role->name != 'admin')
            <a class="confirm-action-button"
               data-uk-modal="{target:'#confirmationModal'}"
               data-action="{{route('management.admin.role.destroy',$role->id)}}"
               data-custom_method='@method('DELETE')'
            ><i class="md-icon material-icons">delete</i></a>
        @endif
        @endpermission
    </td>
</tr>
