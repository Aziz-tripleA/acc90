<tr>
    <td>{{$announcement->title}}</td>
    <td>{{$announcement->date}}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('ads.admin.edit',$announcement->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('ads.admin.destroy',$announcement->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
