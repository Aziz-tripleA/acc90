<tr>
    <td>{{$publisher->publish_name}}</td>
    <td>{{$publisher->created_at }}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('publisher.admin.edit',$publisher->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('publisher.admin.destroy',$publisher->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
