@extends('layouts.admin.dashboard')
@section('title','Advice requests')

@section('d-content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js" rel="stylesheet"/>

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <form action="{{route('askhelp.admin.index')}}">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="contact_list_search">Search...</label>
                        <input class="md-input" name="q" value="{{request('q')}}" type="text" id="contact_list_search"/>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="gender" name="gender" data-md-selectize>
                            <option value="" selected disabled>Gender</option>
                            <option @if(request('gender') == 'all') selected @endif value="all">All</option>
                            @foreach(['انثي','ذكر'] as $item)
                                <option @if(request('gender') == $item) selected
                                        @endif value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="city" name="city" data-md-selectize>
                            <option value="" selected disabled>City</option>
                            <option @if(request('city') == 'all') selected @endif value="all">All</option>
                            @foreach($cities as $item)
                                <option @if(request('city') == $item) selected
                                        @endif value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="day" name="day" data-md-selectize>
                            <option value="" selected disabled>Day</option>
                            <option @if(request('day') == 'all') selected @endif value="all">All</option>
                            @foreach($days as $item)
                                <option @if(request('day') == $item) selected
                                        @endif value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="time" name="time" data-md-selectize>
                            <option value="" selected disabled>Time</option>
                            <option @if(request('time') == 'all') selected @endif value="all">All</option>
                            @foreach($times as $item)
                                <option @if(request('time') == $item) selected
                                        @endif value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="uk-text-right mt-20">
                    <a class="md-btn md-btn-flat md-btn-wave waves-effect waves-button"
                       href="{{route('askhelp.admin.index')}}">Reset Filters</a>
                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Filter Results
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if (!$requests->count())
        @include('pages._partials.no-listing-data')
    @else
        <h3 class="uk-text-large ml-20">({{$requests->total()}}) Requests</h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-nowrap">
                        <thead>
                        <tr>
                            <th class="uk-width-3-12">Name</th>
                            <th class="uk-width-1-12">Email</th>
                            <th class="uk-width-1-12">Mobile</th>
                            <th class="uk-width-1-12">Age</th>
                            <th class="uk-width-1-12">Gender</th>
                            <th class="uk-width-1-12">City</th>
                            <th class="uk-width-1-12">Contact us before?</th>
                            <th class="uk-width-1-12">Has Previous Counseling?</th>
                            <th class="uk-width-1-12">How you know us?</th>
                            {{-- <th class="uk-width-1-12">Day</th>
                            <th class="uk-width-1-12">Time</th>
                            <th class="uk-width-1-12">Notes</th> --}}
                            <th>Type</th>
                            {{-- <th class="uk-width-1-12 uk-text-center">Actions</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            @include('pages.askhelp.manager.partials.info')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('layouts.admin.partials.pagination',['collection'=>$requests])
    @endif
@endsection
@section('d-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $(".select2").select2({ width: '100%' });  
        });
    </script>
@endsection