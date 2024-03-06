<tr>
    <td>{{$request->fullname}}</td>
    <td>{{$request->email}}</td>
    <td>{{$request->mobile}}</td>
    <td>{{$request->age}}</td>
    <td>{{$request->humanType}}</td>
    <td>{{$request->city}}</td>
    <td>{{$request->contactBefore}}</td>
    <td>{{$request->has_previous_help}}</td>
    <td>{{$request->how_know}}</td>
    {{-- <td>{{$request->day}}</td>
    <td>{{$request->time.''.$request->am_pm}}</td>
    <td>{{$request->notes}}</td> --}}
    <td>{{$request->type?$request->type->type:''}}</td>
    {{-- <td>
        @can('view_dashboard')
        <a href="{{route('askhelp.admin.edit',$request->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('askhelp.admin.destroy',$request->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
    </td> --}}
</tr>
