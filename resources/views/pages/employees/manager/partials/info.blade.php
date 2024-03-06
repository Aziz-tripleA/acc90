<tr>
    <td>{{$employee->name}}</td>
    <td>{{$employee->position}}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('employee.admin.edit',$employee->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('employee.admin.destroy',$employee->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
