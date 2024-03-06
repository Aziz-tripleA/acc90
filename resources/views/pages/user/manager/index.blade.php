@extends('layouts.admin.dashboard')
@section('title','Users')
@section('d-content')
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <form action="{{route('user.admin.index')}}">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-4">
                        <select name="status_id" data-md-selectize>
                            <option value="" selected disabled>Status</option>
                            <option value="all">All</option>
                            @foreach($status as $item)
                                <option @if(request('status_id') == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-3-4">
                        <label for="contact_list_search">Search...</label>
                        <input class="md-input" name="q" value="{{request('q')}}" type="text" id="contact_list_search"/>
                    </div>
                </div>
                <div class="uk-text-right mt-20">
                    <a class="md-btn md-btn-flat md-btn-wave waves-effect waves-button"
                       href="{{route('user.admin.index')}}">Reset Filters</a>
                    <button type="submit"
                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Filter Results
                    </button>

                </div>
            </form>
        </div>
    </div>
    @if (!$users->count())
        @include('pages._partials.no-listing-data')
    @else
        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-5 hierarchical_show"
             id="contact_list">
            <h3 class="uk-text-large ml-20">({{$users->total()}}) Users</h3>
            @foreach($users as $user)
                @include('pages.user.manager.partials.info')
            @endforeach
        </div>
        <div class="clearfix"></div>
    @endif
    @include('layouts.admin.partials.pagination',['collection'=>$users])
@endsection