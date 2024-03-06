@extends('layouts.admin.dashboard')
@section('title','Orders')
@section('d-content')
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <form action="{{route('order.admin.index')}}">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-3">
                        <select id="order_status" name="status" data-md-selectize>
                            <option value="">Status</option>
                            <option  @if(request('status') == 'all') selected
                                     @endif value="all">All</option>
                            @foreach($status as $item)
                                <option
                                        @if(request('status') == $item->id) selected
                                        @endif
                                        value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-2-3">
                        <label for="contact_list_search">Search... (Order #, Customer Name, Customer Phone, Customer Email)</label>
                        <input class="md-input" name="q" value="{{request('q')}}" type="text" id="contact_list_search"/>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon">
                                <i class="uk-input-group-icon uk-icon-calendar"></i>
                            </span>
                            <label for="uk_dp_start">Date From</label>
                            <input class="md-input" type="text" name="created_at_from" autocomplete="off"
                                   value="{{request('created_at_from')}}"
                                   id="uk_dp_start">
                            @include("layouts.partials.form-errors",['field'=>"from"])
                        </div>

                    </div>
                    <div class="uk-width-medium-1-4">
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon">
                                <i class="uk-input-group-icon uk-icon-calendar"></i>
                            </span>
                            <label for="uk_dp_end">Date To</label>
                            <input class="md-input" name="created_at_to" autocomplete="off"
                                   value="{{request('created_at_to')}}"
                                   type="text" id="uk_dp_end">
                            @include("layouts.partials.form-errors",['field'=>"to"])
                        </div>

                    </div>
                    <div class="uk-width-medium-2-4 uk-text-right" style="padding-top: 11px;">
                        <a class="md-btn md-btn-flat md-btn-wave waves-effect waves-button"
                           href="{{route('order.admin.index')}}">Reset Filters</a>
                        <button type="submit"
                                class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                            Filter Results
                        </button>

                        <a class="md-btn md-btn-warning md-btn-wave-light waves-effect waves-button waves-light"
                           href="{{route('order.admin.export',request()->getQueryString())}}">Export Results</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (!$orders->count())
        @include('pages._partials.no-listing-data')
    @else
        <h3 class="uk-text-large ml-20">({{$orders->total()}}) Orders</h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th class="uk-width-2-10">Status</th>
                            <th class="uk-width-2-10 uk-text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @include('pages.orders.manager.partials.info')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('layouts.admin.partials.pagination',['collection'=>$orders])
    @endif
@endsection
@section('d-scripts')
    <script>
        $(function () {
            altair_form_adv.date_range()
        }), altair_form_adv = {
            date_range: function () {
                var t = $("#uk_dp_start"), e = $("#uk_dp_end"), i = UIkit.datepicker(t, {format: "YYYY-MM-DD"}),
                    n = UIkit.datepicker(e, {format: "YYYY-MM-DD"});
                t.on("change", function () {
                    n.options.minDate = t.val(), setTimeout(function () {
                        e.focus()
                    }, 300)
                }), e.on("change", function () {
                    i.options.maxDate = e.val()
                })
            }
        };
    </script>
@endsection
