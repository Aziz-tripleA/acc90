<tr>
    <td>{{$number->title}}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('number.admin.edit',$number->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('number.admin.destroy',$number->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
