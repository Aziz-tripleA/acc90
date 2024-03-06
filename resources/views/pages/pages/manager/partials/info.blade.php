<tr>
    <td>{{$page->title}}</td>
    <td>
        @permission('edit_pages')
        <a href="{{route('page.admin.edit',$page->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endpermission
    </td>
</tr>
