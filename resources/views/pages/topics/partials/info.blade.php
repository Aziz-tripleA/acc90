<tr>
    <td>{{$topic->title}}</td>
    <td>{{$topic->type}}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('topic.admin.edit',$topic->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('topic.admin.destroy',$topic->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
