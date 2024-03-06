<tr>
    <td>{{$writer->name}}</td>
    <td>{{$writer->updated_at }}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('writer.admin.edit',$writer->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('writer.admin.destroy',$writer->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
