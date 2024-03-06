<tr>
    <td>{{$bookType->type_name}}</td>
    <td>{{$bookType->created_at }}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('bookType.admin.edit',$bookType->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('bookType.admin.destroy',$bookType->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
