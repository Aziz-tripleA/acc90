@extends('layouts.admin.dashboard')
@section('title','Articles')
@section('d-buttons')
    @can('view_dashboard')
    <a href="{{route('article.admin.create')}}"
       class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-float-right">
        Add New article
    </a>
    @endcan
@endsection
@section('d-content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js" rel="stylesheet"/>

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <form action="{{route('article.admin.index')}}">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="contact_list_search">Search...</label>
                        <input class="md-input" name="q" value="{{request('q')}}" type="text" id="contact_list_search"/>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="writer" name="writer" data-md-selectize>
                            <option value="" selected disabled>Writer</option>
                            <option @if(request('writer') == 'all') selected @endif value="all">All</option>
                            @foreach($writers as $item)
                                <option @if(request('writer') == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="type" name="type" data-md-selectize>
                            <option value="" selected disabled>Topic</option>
                            <option @if(request('type') == 'all') selected @endif value="all">All</option>
                            @foreach($types as $item)
                                <option @if(request('type') == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="uk-text-right mt-20">
                    <a class="md-btn md-btn-flat md-btn-wave waves-effect waves-button"
                       href="{{route('article.admin.index')}}">Reset Filters</a>
                    <button type="submit"
                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Filter Results
                    </button>

                </div>
            </form>
        </div>
    </div>
    @if (!$articles->count())
        @include('pages._partials.no-listing-data')
    @else
        <h3 class="uk-text-large ml-20">({{$articles->total()}}) Articles</h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-nowrap">
                        <thead>
                        <tr>
                            <th class="uk-width-1-10 uk-text-center">Image</th>
                            <th class="uk-width-4-10" style="max-width: 300px !important;overflow-x: auto;">Title</th>
                            <th class="uk-width-4-10">Topic</th>
                            <th class="uk-width-4-10">Writer</th>
                            <th class="uk-width-4-10">Last Update At</th>
                            <th class="uk-width-3-10 uk-text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            @include('pages.articles.manager.partials.info')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('layouts.admin.partials.pagination',['collection'=>$articles])
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