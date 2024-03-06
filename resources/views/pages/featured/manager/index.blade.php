@extends('layouts.admin.dashboard')
@section('title','Featured Images')

@section('d-content')
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <form action="{{route('featured.admin.index')}}">
                <div class="uk-grid" data-uk-grid-margin>
                    
                    <div class="uk-width-medium-2-3">
                        <label for="contact_list_search">Search... </label>
                        <input class="md-input" name="q" value="{{request('q')}}" type="text" id="contact_list_search"/>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    
                    <div class="uk-width-medium-2-4 uk-text-right" style="padding-top: 11px;">
                        <a class="md-btn md-btn-flat md-btn-wave waves-effect waves-button"
                           href="{{route('featured.admin.index')}}">Reset Filters</a>
                        <button type="submit"
                                class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                            Filter Results
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (!$featuredImages->count())
        @include('pages._partials.no-listing-data')
    @else
        <h3 class="uk-text-large ml-20">({{$featuredImages->total()}}) Featured Images</h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="uk-width-4-10">Title</th>
                            <th class="uk-width-1-10 uk-text-center">Image</th>
                            <th class="uk-width-2-10 uk-text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($featuredImages as $featuredImage)
                            @include('pages.featured.manager.partials.info')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('layouts.admin.partials.pagination',['collection'=>$featuredImages])
    @endif
@endsection