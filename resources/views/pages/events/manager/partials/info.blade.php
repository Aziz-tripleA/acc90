<tr>
    <td>{{$event->title}}</td>
    <td>{{$event->body?:'---'}}</td>
    <td>
        @permission('edit_news')
        <a href="{{route('event.admin.edit',$event->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endpermission
        @permission('delete_news')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('event.admin.destroy',$event->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endpermission
    </td>
</tr>
