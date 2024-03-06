<tr>
    <td>{{$author->author_name}}</td>
    <td>{{date('d/m/Y', strtotime($author->created_at)) }}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('author.admin.edit',$author->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('author.admin.destroy',$author->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
