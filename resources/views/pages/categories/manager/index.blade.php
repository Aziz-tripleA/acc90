@extends('layouts.admin.dashboard')
@section('title','Categories')
@section('d-buttons')
    @permission('add_categories')
    <a href="{{route('category.admin.create')}}"
       class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-float-right">
        Add New Category
    </a>
    @endpermission
@endsection
@section('d-content')
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <form action="{{route('category.admin.index')}}">
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
                       href="{{route('category.admin.index')}}">Reset Filters</a>
                    <button type="submit"
                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Filter Results
                    </button>

                </div>
            </form>
        </div>
    </div>
    @if (!$categories->count())
        @include('pages._partials.no-listing-data')
    @else
        <h3 class="uk-text-large ml-20">({{$categories->total()}}) Main Categories</h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-nowrap table-nested">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Status</th>
                            {{--                            <th>Products</th>--}}
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $firstCategoryKey=>$category)
                            @php
                                $parentId = 'parent-'.$firstCategoryKey
                            @endphp
                            @include('pages.categories.manager.partials.info',[
                            'tr_class'=>$category->children?'parent':'',
                            'tr_id'=>$parentId,
                            ])
                            @foreach($category->children->sortBy('name') as $secondCategoryKey=>$secondCategory)
                                @php
                                    $secondId = 'parent-'.$firstCategoryKey.'-'.$secondCategoryKey
                                @endphp
                                @include('pages.categories.manager.partials.info',[
                            'category'=>$secondCategory,
                           'tr_class'=>$secondCategory->children->count() ?'nested child parent': 'nested child',
                           'data_parent'=>$parentId,
                           'tr_id'=>$secondId,
                           ])
                                @foreach($secondCategory->children->sortBy('name') as $thirdLevelChildKey=>$thirdLevelChild)
                                    @php
                                        $thirdId = 'parent-'.$firstCategoryKey.'-'.$secondCategoryKey.'-'.$thirdLevelChildKey
                                    @endphp
                                    @include('pages.categories.manager.partials.info',[
                                'category'=>$thirdLevelChild,
                               'tr_class'=>$thirdLevelChild->children->count() ?'nested child-child parent': 'nested child-child',
                               'data_parent'=>$secondId,
                               'data_top_parent'=>$parentId,
                                'tr_id'=>$thirdId,
                               ])
                                    @foreach($thirdLevelChild->children->sortBy('name') as $key=>$lastChild)
                                        @include('pages.categories.manager.partials.info',[
                                    'category'=>$lastChild,
                                   'tr_class'=>$lastChild->children->count() ?'nested child-child parent': 'nested child-child-child',
                                   'data_parent'=>$thirdId,
                                   'data_top_parent'=>$parentId,
                                   ])
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                        {{--<tr class="parent" id="parent-1">--}}
                        {{--<td>Rich Parent</td>--}}
                        {{--<td><span class="uk-badge uk-badge-success">Active</span></td>--}}
                        {{--<td>10</td>--}}
                        {{--<td>--}}
                        {{--<a href="#"><i class="md-icon material-icons">&#xE254;</i></a>--}}
                        {{--<a href="#"><i class="md-icon material-icons">delete</i></a>--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr class="nested child parent" id="parent-2" data-parent="parent-1">--}}
                        {{--<td>Child</td>--}}
                        {{--<td><span class="uk-badge uk-badge-success">Active</span></td>--}}
                        {{--<td>10</td>--}}
                        {{--<td>--}}
                        {{--<a href="#"><i class="md-icon material-icons">&#xE254;</i></a>--}}
                        {{--<a href="#"><i class="md-icon material-icons">delete</i></a>--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr class="nested child-child" data-parent="parent-2">--}}
                        {{--<td>Child-Child</td>--}}
                        {{--<td><span class="uk-badge uk-badge-success">Active</span></td>--}}
                        {{--<td>10</td>--}}
                        {{--<td>--}}
                        {{--<a href="#"><i class="md-icon material-icons">&#xE254;</i></a>--}}
                        {{--<a href="#"><i class="md-icon material-icons">delete</i></a>--}}
                        {{--</td>--}}
                        {{--</tr>--}}


                        {{--<tr class="parent" id="parent-3">--}}
                        {{--<td>Parent</td>--}}
                        {{--<td><span class="uk-badge uk-badge-success">Active</span></td>--}}
                        {{--<td>10</td>--}}
                        {{--<td>--}}
                        {{--<a href="#"><i class="md-icon material-icons">&#xE254;</i></a>--}}
                        {{--<a href="#"><i class="md-icon material-icons">delete</i></a>--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr class="nested child" data-parent="parent-3">--}}
                        {{--<td>Child</td>--}}
                        {{--<td><span class="uk-badge uk-badge-success">Active</span></td>--}}
                        {{--<td>10</td>--}}
                        {{--<td>--}}
                        {{--<a href="#"><i class="md-icon material-icons">&#xE254;</i></a>--}}
                        {{--<a href="#"><i class="md-icon material-icons">delete</i></a>--}}
                        {{--</td>--}}
                        {{--</tr>--}}


                        {{--<tr>--}}
                        {{--<td>Poor Parent</td>--}}
                        {{--<td><span class="uk-badge uk-badge-success">Active</span></td>--}}
                        {{--<td>10</td>--}}
                        {{--<td>--}}
                        {{--<a href="#"><i class="md-icon material-icons">&#xE254;</i></a>--}}
                        {{--<a href="#"><i class="md-icon material-icons">delete</i></a>--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        </tbody>
                    </table>
                </div>
                @include('layouts.admin.partials.pagination',['collection'=>$categories])
            </div>
        </div>
    @endif
@endsection
