@extends('layouts.admin.app')
@section('title','#'.$request->id)
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
            brequest-color: #666 !important;
        }

        .ship-table,
        .title-table {
            text-align: left !important;
            padding: 10px 20px !important;
            brequest:1px solid #bbb !important;;
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
<img src="{{asset('assets/images/icons/logo-white.png')}}" width="250" alt="" style="background: #a0dbdd;padding: 20px;">
<div class="uk-grid">
    <div class="uk-width-medium-1-1">
        <table class="uk-table">
            <tbody>
            <tr>
                <td class="uk-text-bold title-table">{{$request->fullname}}</td>
            </tr>
            <tr>
                <td class="uk-text-bold title-table">Request Time: {{$request->day}} at {{$request->time}} {{$request->am_pm}}</td>
            </tr>
            <tr>
                <td class="ship-table">
                    Name: {{$request->fullname}}<br>
                    Email: {{$request->email}}<br>
                    Mobile: {{$request->mobile}}<br>
                    Age: {{$request->age}}<br>
                    Gender: {{$request->humanType}}<br>
                    Time: {{$request->time}} {{$request->am_pm}}<br>
                    Day: {{$request->day}}<br>
                    City: {{$request->city}}<br>
                </td>
            </tr>
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
                location.href = "{{route('askhelp.edit',$request)}}"
            };
        });
    </script>
@endsection
