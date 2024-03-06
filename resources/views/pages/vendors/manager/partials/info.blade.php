<tr>
    <td>{{$vendor->name}}</td>
{{--    <td>{{$vendor->products->count()}}</td>--}}
    <td>
        @permission('edit_vendors')
        <a href="{{route('vendor.admin.edit',$vendor->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endpermission
        @permission('delete_vendors')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('vendor.admin.destroy',$vendor->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endpermission
    </td>
</tr>
