@extends('layouts.admin.dashboard')
@section('title','Products')
@section('d-buttons')
    @permission('add_products')
    <a href="{{route('slide.admin.create')}}"
       class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-float-right">
        Add New Slider
    </a>
    @endpermission
@endsection
@section('d-content')
    @if (!$slides->count())
        @include('pages._partials.no-listing-data')
    @else
        <h3 class="uk-text-large ml-20">({{$slides->total()}}) Slides</h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-nowrap">
                        <thead>
                            <tr>
                                <th class="uk-width-1-10 uk-text-center">Image</th>
                                <th class="uk-width-4-10">Title</th>
                                <th class="uk-width-2-10">Text</th>
                                <th class="uk-width-2-10">Button Text</th>
                                <th class="uk-width-2-10">Button Url</th>
                                <th class="uk-width-3-10 uk-text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($slides as $slide)
                            @include('pages.slider.partials.info')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('layouts.admin.partials.pagination',['collection'=>$slides])
    @endif
@endsection
