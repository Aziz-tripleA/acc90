@extends('layouts.admin.dashboard')
@section('title','Order #'.$order->short_id)
@section('d-buttons')
    <a href="{{route('order.admin.print',$order->id)}}"
       class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-float-right  md-btn-icon">
        <i class="uk-icon-print"></i>
        Invoice
    </a>
@endsection
@section('d-content')
    <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
        <div class="uk-width-xLarge-8-10  uk-width-large-6-10">
            <div class="md-card">
                <div class="md-card-toolbar">
                    <h3 class="md-card-toolbar-heading-text">
                        Order Summary
                    </h3>
                </div>
                <div class="md-card-content">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-1-1">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Customer Name</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    <span class="uk-text-large uk-text-middle"><a
                                                href="{{route('user.admin.edit',$order->user->id)}}">{{$order->user->full_name}}</a></span>
                                </div>
                            </div>
                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Customer Phone</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    <span class="uk-text-large uk-text-middle">{{$order->user->mobile}}</span>
                                </div>
                            </div>
                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Status</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    <span class="uk-badge uk-badge-{{$order->status->color}}">{{$order->status->title}}</span>
                                </div>
                            </div>
                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Total</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    {{number_format($order->amount,2)}}
                                </div>
                            </div>
                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Payment Method</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    {{$order->payment_method->title}}
                                </div>
                            </div>
                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Shipping Method</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    {{$order->shipping_method->title}}
                                </div>
                            </div>
                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Delivery Time</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    {{$order->delivery_time->title}}
                                </div>
                            </div>
                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Date</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    {{$order->created_at->format('d/m/Y')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-toolbar">
                    <h3 class="md-card-toolbar-heading-text">
                        Order Details
                    </h3>
                </div>
                <div class="md-card-content large-padding">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <table class="uk-table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->cart->basket as $cartBasket)
                                    <tr>
                                        <td>
                                            <a href="{{route('product.admin.edit',$cartBasket->product->id)}}">{{$cartBasket->product_info->title}}</a>
                                            @if($cartBasket->options)
                                                @foreach ($cartBasket->options()->whereHas('option')->get() as $option)
                                                    <div>
                                                        <b>{{$option->option->attribute_name}}: </b>
                                                        {{$option->option->option ? $option->option->option->name : $option->option->value}}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{$cartBasket->quantity}}</td>
                                        <td>{{number_format($cartBasket->price,2)}}</td>
                                        <td>{{number_format($cartBasket->sub_total,2)}}</td>
                                    </tr>
                                @endforeach
                                @foreach($order->totals as $item)
                                    <tr>
                                        <td colspan="2" class="uk-text-left"
                                            style="background: #fcfcfc;font-weight: bold;padding: 10px 30px;">{{$item['label']}}</td>
                                        <td colspan="2" class="uk-text-right"
                                            style="background: #fcfcfc;font-weight: bold;padding: 10px 30px;">{{$item['amount']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-width-xLarge-2-10 uk-width-large-4-10">
            <div class="md-card">
                <div class="md-card-toolbar">
                    <h3 class="md-card-toolbar-heading-text">
                        Order Status
                    </h3>
                </div>
                <div class="md-card-content">
                    <form action="{{route('order.admin.update',$order->id)}}" method="post" class="ajax"
                          id="orderStatus">
                        @method('PATCH')
                        @csrf
                        <div class="uk-form-row">
                            <label for="product_edit_manufacturer_control" class="uk-form-label">
                                Status
                            </label>
                            <select id="product_edit_manufacturer_control" name="status_id" data-md-selectize
                                    data-md-selectize-bottom>
                                @foreach($status as $item)
                                    <option
                                            @if($order->status_id == $item->id) selected
                                            @endif
                                            value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                                type="submit">
                            Update
                        </button>
                    </form>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-toolbar">
                    <h3 class="md-card-toolbar-heading-text">
                        Shipping
                    </h3>
                </div>
                <div class="md-card-content">
                    <ul class="md-list">
                        <li>
                            <div class="md-list-content">
                                <span class="uk-text-small uk-text-muted uk-display-block">Title</span>
                                <span class="md-list-heading uk-text-large">{{$order->address_info->title}}</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="uk-text-small uk-text-muted uk-display-block">Area</span>
                                <span class="md-list-heading uk-text-large">{{$order->address_info->area}}</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="uk-text-small uk-text-muted uk-display-block">City</span>
                                <span class="md-list-heading uk-text-large">{{$order->address_info->city->title}}</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="uk-text-small uk-text-muted uk-display-block">Country</span>
                                <span class="md-list-heading uk-text-large">{{$order->address_info->country}}</span>
                            </div>
                        </li>

                        <li>
                            <div class="md-list-content">
                                <span class="uk-text-small uk-text-muted uk-display-block">Street Address</span>
                                <span class="md-list-heading uk-text-large">{{$order->address_info->street_address}}</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="uk-text-small uk-text-muted uk-display-block">Building No.</span>
                                <span class="md-list-heading uk-text-large">{{$order->address_info->building_number}}</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="uk-text-small uk-text-muted uk-display-block">Floor No.</span>
                                <span class="md-list-heading uk-text-large">{{$order->address_info->floor_number}}</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <span class="uk-text-small uk-text-muted uk-display-block">Apartment No.</span>
                                <span class="md-list-heading uk-text-large">{{$order->address_info->apartment_number}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
