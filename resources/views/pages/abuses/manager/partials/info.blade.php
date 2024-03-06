<tr>
    <td>{!! $abuse->text !!}</td>
    <td>{{$abuse->updated_at }}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('abuse.admin.edit',$abuse->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('abuse.admin.destroy',$abuse->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
