<tr>
    <td><img src="{{$service->getUrlFor('cover')?:asset('assets/admin/img/avatars/avatar_01_tn.png')}}"/></td>
    <td>{{$service->name}}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('service.admin.edit',$service->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('service.admin.destroy',$service->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>