@extends('layouts.dashboard')
@section('d-content')
<div class="col-12 col-md-8">
    <!-- inner header-->
    <div class="row inner-header">
        <!-- Make sure you add ".inner-title > h3" for page title,-->
        <!-- also .inner-btns to buttons parent container-->
        <div class="col-12 col-md inner-title">
            <h3>my favourites</h3>
        </div>
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST">
                        <div class="input-group">
                            <input class="form-control"
                                type="text"
                                aria-describedby="favourites-search"
                                aria-label="search favourites"
                                placeholder="search favourites"/>
                            <div class="input-group-append">
                            <button class="btn input-group-text" type="submit" id="favourites-search">
                                <i class="material-icons">search</i>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- inner header-->
        <div class="col-12 inner-filter-select justify-content-between mt-4">
            <h6 class="inner-select-title">{{count($services)}} favourite services</h6>
        </div>
    </div>
    <!-- inner content-->
    <div class="row inner-content" id="fouritesListing-content">
        <div class="col-12">
            <div class="row">
                @foreach ($bookmarks as $service)
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        @include('pages.services.partials.info')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
