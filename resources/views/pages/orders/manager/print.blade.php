@extends('layouts.admin.app')
@section('title','#'.$order->short_id)
@section('styles')
    <link type="text/css" href="{{asset('assets/admin/css/main.css')}}" rel="stylesheet"/>
    <style>
        body {
            background: #fff !important;
            padding: 50px 100px !important;
        }

        td.total {
            background: #f5f5f5 !important;
            font-weight: bold;
            padding: 10px 30px !important;
        }

        td.title-table {
            color: #fff !important;
            background: #666 !important;
            border-color: #666 !important;
        }

        .ship-table,
        .title-table {
            text-align: left !important;
            padding: 10px 20px !important;
            border:1px solid #bbb !important;;
        }

        th.ship-table {
            background: #f5f5f5 !important;
            font-size: 16px;
        }
        th{
            font-weight: bold !important;
        }

        td.ship-table {
        }

        img {
            margin: 10px 50px 30px;
        }
    </style>
@endsection
@section('content')
@section('body_class','disable_transitions sidebar_main_open sidebar_main_swipe')
<img src="{{asset('assets/front/images/logo.png')}}" width="300" alt="">
<div class="uk-grid">
    <div class="uk-width-medium-1-1">
        <table class="uk-table">
            <tbody>
            <tr>
                <td class="uk-text-bold title-table">Order #{{$order->short_id}}</td>
            </tr>
            <tr>
                <td class="uk-text-bold title-table">Order Date: {{$order->created_at->format('F j, Y')}}</td>
            </tr>
            <tr>
                <th class="uk-text-bold ship-table">Ship to</th>
            </tr>
            <tr>
                <td class="ship-table">
                    {{$order->user->full_name}}<br>
                    {{$order->address_info->street_address}}<br>
                    Area: {{$order->address_info->area}}<br>
                    Building: {{$order->address_info->building_number}},
                    Floor: {{$order->address_info->floor_number}},
                    Apt: {{$order->address_info->apartment_number}}<br>
                    {{$order->address_info->city->title}},
                    {{$order->address_info->country}}<br>
                    T: {{$order->user->mobile}}<br>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="uk-table">
            <tbody>
            <tr>
                <th class="uk-text-bold ship-table">Payment Method</th>
                <th class="uk-text-bold ship-table">Shipping Method</th>
            </tr>
            <tr>
                <td class="ship-table">
                    {{$order->payment_method->title}}
                </td>
                <td class="ship-table">
                    {{$order->shipping_method->title}}<br>
                    {{$order->delivery_time->title}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-medium-1-1">
        <table class="uk-table" style="margin-top: 60px;">
            <thead>
            <tr>
                <th class="uk-text-bold">Product</th>
                <th class="uk-text-bold">SKU</th>
                <th class="uk-text-bold">Quantity</th>
                <th class="uk-text-bold">Price</th>
                <th class="uk-text-bold">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->cart->basket as $cartBasket)
                <tr>
                    <td>
                        {{$cartBasket->product_info->title}}
                        @if($cartBasket->options)
                            @foreach ($cartBasket->options as $option)
                                <div>
                                    <b>{{$option->option->attribute_name}}: </b>
                                    {{$option->option->option ? $option->option->option->name : $option->option->value}}
                                </div>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        {{$cartBasket->product->sku}}
                    </td>
                    <td>{{$cartBasket->quantity}}</td>
                    <td>{{number_format($cartBasket->price,2)}}</td>
                    <td>{{number_format($cartBasket->sub_total,2)}}</td>
                </tr>
            @endforeach
            @foreach($order->totals as $item)
                <tr>
                    <td colspan="2" class="uk-text-left total">{{$item['label']}}</td>
                    <td colspan="3" class="uk-text-right total">{{$item['amount']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('assets/admin/js/main.js')}}"></script>
    <script>
        $(document).ready(function () {
            window.print();
            window.onafterprint = function (event) {
                location.href = "{{route('order.admin.index')}}"
            };
        });
    </script>
@endsection
