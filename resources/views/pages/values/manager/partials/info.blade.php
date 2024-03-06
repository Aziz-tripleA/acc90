<tr>
    <td>{{$value->name}}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('value.admin.edit',$value->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('value.admin.destroy',$value->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>