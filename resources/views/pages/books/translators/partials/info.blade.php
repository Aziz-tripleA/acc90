<tr>
    <td>{{$translator->translator_name}}</td>
    <td>{{$translator->created_at }}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('translator.admin.edit',$translator->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('translator.admin.destroy',$translator->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td>
</tr>
