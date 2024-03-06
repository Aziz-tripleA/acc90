<tr @isset($tr_class) class="{{$tr_class}}" @endisset
@isset($tr_id) id="{{$tr_id}}" @endisset
    @isset($data_parent) data-parent="{{$data_parent}}" @endisset
    @isset($data_top_parent) data-top_parent="{{$data_top_parent}}" @endisset>
    <td>
        @if(sizeof($category->children))
            <a class="k-cursor-pointer">{{$category->name}}</a>
        @else
            {{$category->name}}
        @endif
    </td>
    <td><span class="uk-badge uk-badge-{{$category->status->color}}">{{$category->status->title}}</span></td>
    <td>
        @permission('edit_categories')
        <a href="{{route('category.admin.edit',$category->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endpermission
        @permission('delete_categories')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('category.admin.destroy',$category->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endpermission

    </td>
</tr>
