<tr>
    <td style="max-width: 300px !important;overflow-x: auto;">{{$audio->title}}</td>
    <td><audio style="height:50px" controls>
        <source src="{{$audio->getUrlFor('file')}}" type="audio/mp3">
        </audio>
    </td>
    <td><input type="text" style="max-width: 600px !important;overflow-x: auto;" class="md-input" value="{{$audio->getUrlFor('file')}}" disabled/></td>
    <td>
        @can('view_dashboard')
        <a href="{{route('audio.admin.edit',$audio->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('audio.admin.destroy',$audio->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>