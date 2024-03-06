<tr>
    <td>{{$perpos->title}}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('perpos.admin.edit',$perpos->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('perpos.admin.destroy',$perpos->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
