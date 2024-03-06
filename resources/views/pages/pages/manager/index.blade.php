@extends('layouts.admin.dashboard')
@section('title','Pages')
@section('d-content')
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-nowrap">
                    <thead>
                    <tr>
                        <th class="uk-width-7-10">Title</th>
                        <th class="uk-width-3-10 uk-text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        @include('pages.pages.manager.partials.info')
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
