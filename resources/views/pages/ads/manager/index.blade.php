@extends('layouts.admin.dashboard')
@section('title','Announcements')
@section('d-buttons')
    @can('view_dashboard')
    <a href="{{route('ads.admin.create')}}"
       class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-float-right">
        Add New Announcement
    </a>
    @endcan
@endsection
@section('d-content')
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <form action="{{route('ads.admin.index')}}">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="contact_list_search">Search...</label>
                        <input class="md-input" name="q" value="{{request('q')}}" type="text" id="contact_list_search"/>
                    </div>
                </div>
                <div class="uk-text-right mt-20">
                    <a class="md-btn md-btn-flat md-btn-wave waves-effect waves-button"
                       href="{{route('ads.admin.index')}}">Reset Filters</a>
                    <button type="submit"
                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Filter Results
                    </button>

                </div>
            </form>
        </div>
    </div>
    @if (!$ads->count())
        @include('pages._partials.no-listing-data')
    @else
        <h3 class="uk-text-large ml-20">({{$ads->total()}}) Announcements</h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-nowrap">
                        <thead>
                        <tr>
                            <th class="uk-width-4-10">Title</th>
                            <th class="uk-width-4-10">date</th>
                            <th class="uk-width-3-10 uk-text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ads as $announcement)
                            @include('pages.ads.manager.partials.info')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('layouts.admin.partials.pagination',['collection'=>$ads])
    @endif
@endsection
