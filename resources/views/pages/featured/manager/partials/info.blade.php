<tr>
    <td>{{$featuredImage->id}}</td>
    <td>{{$featuredImage->title}}</td>
    <td><img src="{{$featuredImage->getUrlFor('cover')?:asset('assets/admin/img/avatars/avatar_01_tn.png')}}"/></td>
    <td>
        @can('view_dashboard')
        <a href="{{route('featured.admin.edit',$featuredImage->id)}}">
            <i class="md-icon material-icons">&#xE254;</i>
        </a>
        @endcan       
    </td>
</tr>