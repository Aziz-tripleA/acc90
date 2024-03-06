<tr>
    <td><img class="img_thumb" style="max-height: 100px;"
             src="{{$slide->getUrlFor('cover','thumb')?:asset('assets/admin/img/avatars/avatar_01_tn.png')}}"/></td>
    <td>{{trimfy($slide->title,50)}}</td>
    <td>{{trimfy($slide->description,50)}}</td>
    <td>{{trimfy($slide->btn_text,50)}}</td>
    <td>{{trimfy($slide->route_name,50)}}</td>

    <td>
        @permission('edit_products')
        <a href="{{route('slide.admin.edit',$slide->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endpermission

        @permission('delete_products')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('slide.admin.destroy',$slide->id)}}"
           data-custom_method='@method('DELETE')'>
            <i class="md-icon material-icons">delete</i>
        </a>
        @endpermission
    </td>
</tr>
