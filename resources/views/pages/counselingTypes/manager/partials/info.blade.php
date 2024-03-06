<tr>
    <td style="max-width: 300px !important;overflow-x: auto;">{{$counselingType->type}}</td>
    <td>
        <a href="{{$counselingType->getUrlFor('form')}}" download="download">{{$counselingType->type}}</a>
    </td>
    <td>
        @can('view_dashboard')
        <a href="{{route('counselingType.admin.edit',$counselingType->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('counselingType.admin.destroy',$counselingType->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>