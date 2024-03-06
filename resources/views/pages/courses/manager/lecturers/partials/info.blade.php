<tr>
    <td>{{$lecturer->name}}</td>
    <td>{{$lecturer->created_at}}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('lecturer.admin.edit',$lecturer->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('lecturer.admin.destroy',$lecturer->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
