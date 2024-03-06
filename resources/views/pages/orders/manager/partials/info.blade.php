<tr>
    <td>{{$order->short_id}}</td>
    <td>{{$order->created_at->format('d/m/Y')}}</td>
    <td>{{$order->user->full_name}}</td>
    <td>{{number_format($order->amount,2)}}</td>
    <td><span class="uk-badge uk-badge-{{$order->status->color}}">{{$order->status->title}}</span></td>
    <td>
        @permission('edit_orders')
        <a href="{{route('order.admin.show',$order->id)}}">
            <i class="md-icon material-icons">visibility</i>
        </a>
        @endpermission
        <a href="{{route('order.admin.print',$order->id)}}">
            <i class="md-icon material-icons">print</i>
        </a>
    </td>
</tr>
