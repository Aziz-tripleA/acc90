<tr>
    <td>{{$bookCategory->cat_name}}</td>
    <td>{{$bookCategory->updated_at }}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('bookCategory.admin.edit',$bookCategory->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('bookCategory.admin.destroy',$bookCategory->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
