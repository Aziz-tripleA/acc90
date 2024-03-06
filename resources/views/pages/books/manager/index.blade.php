@extends('layouts.admin.dashboard')
@section('title','Books')
@section('d-buttons')
    @can('view_dashboard')
    <a href="{{route('book.admin.create')}}"
       class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-float-right">
        Add New Book
    </a>
    @endcan
@endsection
@section('d-content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js" rel="stylesheet"/>

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <form action="{{route('book.admin.index')}}">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="contact_list_search">Search...</label>
                        <input class="md-input" name="q" value="{{request('q')}}" type="text" id="contact_list_search"/>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-4">
                        <select name="status_id" data-md-selectize>
                            <option value="" selected disabled>Status</option>
                            <option @if(request('status_id') == 'all') selected @endif value="all">All</option>
                            @foreach($status as $item)
                                <option @if(request('status_id') == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="author" name="author" data-md-selectize>
                            <option value="" selected disabled>Author</option>
                            <option @if(request('author') == 'all') selected @endif value="all">All</option>
                            @foreach($authors as $item)
                                <option @if(request('author') == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->author_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="publisher" name="publisher" data-md-selectize>
                            <option value="" selected disabled>Publisher</option>
                            <option @if(request('publisher') == 'all') selected @endif value="all">All</option>
                            @foreach($publishers as $item)
                                <option @if(request('publisher') == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->publish_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="translator" name="translator" data-md-selectize>
                            <option value="" selected disabled>Translator</option>
                            <option @if(request('translator') == 'all') selected @endif value="all">All</option>
                            @foreach($translators as $item)
                                <option @if(request('translator') == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->translator_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="type" name="type" data-md-selectize>
                            <option value="" selected disabled>Type</option>
                            <option @if(request('type') == 'all') selected @endif value="all">All</option>
                            @foreach($types as $item)
                                <option @if(request('type') == $item->type_name) selected
                                        @endif value="{{$item->type_name}}">{{$item->type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="uk-width-medium-1-4">
                        <select id="cat" name="cat" data-md-selectize>
                            <option value="" selected disabled>Category</option>
                            <option @if(request('cat') == 'all') selected @endif value="all">All</option>
                            @foreach($categories as $item)
                                <option @if(request('cat') == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="uk-text-right mt-20">
                    <a class="md-btn md-btn-flat md-btn-wave waves-effect waves-button"
                       href="{{route('book.admin.index')}}">Reset Filters</a>
                    <button type="submit"
                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Filter Results
                    </button>

                </div>
            </form>
        </div>
    </div>
    @if (!$books->count())
        @include('pages._partials.no-listing-data')
    @else
        <button style="margin-bottom: 10px"
                class="confirm-action-button md-btn md-btn-danger md-btn-wave-light waves-effect waves-button waves-light mt-20 delete_all"
                data-url="{{route('book.admin.deleteAll')}}">Delete All Selected
        </button>
        @include('pages._partials.sort-by')
        
        <h3 id="count" class="uk-text-large ml-20">({{$books->total()}}) Books</h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-nowrap">
                        <thead>
                        <tr>
                            <th width="20px"><input type="checkbox" id="master"></th>
                            <th width="50px">Image</th>
                            <th class="uk-width-2-10" style="max-width: 90px !important;overflow-x: auto;">Title</th>
                            <th class="uk-width-1-10">Code</th>
                            <th class="uk-width-1-10">Type</th>
                            <th class="uk-width-2-10" style="max-width: 90px !important;overflow-x: auto;">Category</th>
                            <th class="uk-width-2-10" style="max-width: 90px !important;overflow-x: auto;">Author</th>
                            <th class="uk-width-2-10" style="max-width: 90px !important;overflow-x: auto;">Publisher</th>
                            <th class="uk-width-2-10" style="max-width: 90px !important;overflow-x: auto;">Translator</th>
                            <th class="uk-width-2-10" style="max-width: 90px !important;overflow-x: auto;">Last Updated at</th>
                            <th class="uk-width-2-10" style="max-width: 90px !important;overflow-x: auto;">Publish date</th>
                            <th class="uk-width-1-10">Status</th>
                            <th class="uk-width-2-10 uk-text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            @include('pages.books.manager.partials.info')
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('layouts.admin.partials.pagination',['collection'=>$books])
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
    <script>
        $(document).ready(function () {
            $('#master').on('click', function(e) {
                if($(this).is(':checked',true))
                {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                }
            });
            $('.delete_all').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });


                if(allVals.length <=0)
                {
                    alert("Please select item.");
                }  else {
                    var check = confirm("Are you sure you want to delete selected items?");
                    if(check == true){
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    $("#count").text('('+data['count']+')'+' '+data['items']);
                                    console.log('data',data);
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });

                        $.each(allVals, function( index, value ) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });

            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });

            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();
                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
{{-- @include('pages._partials.bulk-delete-scripts') --}}