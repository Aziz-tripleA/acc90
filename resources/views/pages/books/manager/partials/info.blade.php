<tr id="tr_{{$book->id}}">
    <td><input type="checkbox" class="sub_chk" data-id="{{$book->id}}"></td>
    <td><img src="{{ $book->cover?$book->cover->getUrl(): ($book->s_img?:($book->l_img?:asset('assets/images/default_book.png')))}}"/></td>
    <td style="max-width: 90px !important;overflow-x: auto;">{{$book->item_name}}</td>
    <td>{{$book->item_code?$book->item_code:''}}</td>
    <td>{{$book->type?$book->type->type_name:''}}</td>
    <td style="max-width: 90px !important;overflow-x: auto;">{{$book->category?$book->category->cat_name:''}}</td>
    <td style="max-width: 90px !important;overflow-x: auto;">{{$book->author?$book->author->author_name:''}}</td>
    <td style="max-width: 90px !important;overflow-x: auto;">{{$book->publisher?$book->publisher->publish_name:''}}</td>
    <td style="max-width: 90px !important;overflow-x: auto;">{{$book->translator?$book->translator->translator_name:''}}</td>
    <td style="max-width: 90px !important;overflow-x: auto;">{{date('d/m/Y', strtotime($book->updated_at)) }}</td>
    <td style="max-width: 90px !important;overflow-x: auto;">{{$book->pub_date }}</td>
    <td><span class="uk-badge uk-badge-{{$book->status->color}}">{{$book->status->title}}</span></td>

    <td>
        @can('view_dashboard')
        <a href="{{route('book.admin.edit',$book->id)}}"><i class="md-icon material-icons">&#xE254;</i></a>
        @endcan
        @can('view_dashboard')
        <a class="confirm-action-button"
           data-uk-modal="{target:'#confirmationModal'}"
           data-action="{{route('book.admin.destroy',$book->id)}}"
           data-custom_method='@method('DELETE')'
        ><i class="md-icon material-icons">delete</i></a>
        @endcan
        <a href="{{ route('book.admin.create',['clone'=>$book->id]) }}"><span class="material-icons">content_copy</span></a>
    </td>
</tr>
