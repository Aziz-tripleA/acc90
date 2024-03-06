<tr>
    <td><img src="{{$course->getUrlFor('cover')?:asset('assets/admin/img/avatars/avatar_01_tn.png')}}"/></td>
    <td style="max-width: 300px !important;overflow-x: auto;">{{$course->title}}</td>
    <td>{{$course->type?:''}}</td>
    <td>{{$course->topic?$course->topic->title:''}}</td>
    <td>{{$course->lecturer?$course->lecturer->name:''}}</td>
    <td><span class="uk-badge uk-badge-{{$course->status->color}}">{{$course->status->title}}</span></td>
    <td>{{$course->created_at}}</td>

    <td>
        @can('view_dashboard')
        <a href="{{route('course.admin.edit',$course->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('course.admin.destroy',$course->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
        <a href="{{ route('course.admin.create',['clone'=>$course->id]) }}"><span class="material-icons">content_copy</span></a>
    </td>
</tr>
