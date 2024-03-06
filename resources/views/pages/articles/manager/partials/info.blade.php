<tr>
    <td><img src="{{$article->getUrlFor('cover')?:asset('assets/admin/img/avatars/avatar_01_tn.png')}}"/></td>
    <td style="max-width: 300px !important;overflow-x: auto;">{{$article->title}}</td>
    <td>{{$article->topic?$article->topic->title:''}}</td>
    <td>{{$article->writer?$article->writer->name:''}}</td>
    <td>{{$article->updated_at }}</td>
    <td>
        @can('view_dashboard')
        <a href="{{route('article.admin.edit',$article->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('article.admin.destroy',$article->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
        <a href="{{ route('article.admin.create',['clone'=>$article->id]) }}"><span class="material-icons">content_copy</span></a>
    </td>
</tr>