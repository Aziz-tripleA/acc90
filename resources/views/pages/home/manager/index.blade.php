@extends('layouts.admin.dashboard')
@section('title','Home Page')
@section('d-styles')
    <style>
        #sortable {
            list-style-type: none;
            width: 85%;
        }

        #sortable li {
            cursor: move;
            margin: 0 3px 3px 3px;
            padding: 0.4em;
            padding-left: 1.5em;
            font-size: 1.4em;
            height: 18px;
        }

        #sortable li span {
            position: absolute;
            margin: 3px 3px 3px -20px;
        }

        html > body #sortable li {
            height: 1.5em;
            line-height: 1.2em;
        }

        .ui-state-highlight {
            height: 1.5em;
            line-height: 1.2em;
        }
    </style>
@endsection
@section('d-content')

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="md-card">
                <div class="md-card-toolbar">
                    <h3 class="md-card-toolbar-heading-text">
                        Featured Section
                    </h3>
                </div>
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <form id="featuredForm"
                                  action="{{ route('home.admin.featured.store') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="ads">Select Ad:</label>
                                    <select id="ads" class="select2" name="model_id"
                                            data-model="App\Models\Ads"
                                            style="width: 100%;"></select>
                                </div>
                                <div>
                                    <label for="articles">Select Article:</label>
                                    <select id="articles" class="select2" name="model_id"
                                            data-model="App\Models\Article"
                                            style="width: 100%;"></select>
                                </div>
                                <div>
                                    <label for="books">Select Book:</label>
                                    <select id="books" class="select2" name="model_id"
                                            data-model="App\Models\Book"
                                            style="width: 100%;"></select>
                                </div>
                                <div>
                                    <label for="books">Select Service:</label>
                                    <select id="services" class="select2" name="model_id"
                                            data-model="App\Models\Service"
                                            style="width: 100%;"></select>
                                </div>
                                <input type="hidden" name="model_type" id="model_type">
                            </form>
                            {{--                                                <select class="select2">--}}
                            {{--                                                    @foreach(App\Models\Article::all() as $article)--}}
                            {{--                                                        <option value="{{$article->id}}">{{$article->title}}</option>--}}
                            {{--                                                    @endforeach--}}
                            {{--                                                </select>--}}

                        </div>
                        <div class="uk-width-medium-1-2">
                            <ul id="sortable" style="list-style: none">
                                @foreach($featuredItems as $item)
                                    <li data-id="{{ $item->id }}" class="ui-state-default">
                                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>({{ class_basename($item->featureable_type) }})  {{ $item->featureable->title ?? $item->featureable->item_name??$item->featureable->name??'No Title' }}
                                        <form
                                            action="{{ route('home.admin.featured.destroy', $item->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Remove</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                            <button id="saveOrder">Save Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 5rem;">
        <form action="{{route('home.admin.update')}}" method="POST" class="ajax" id="configUpdate"
              enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Home Page
                            </h3>
                        </div>
                        <div class="md-card-content">
                            @include('pages.home.manager.form')
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-2-3">
                            <button
                                class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                                type="submit">
                                Update
                            </button>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <a href="{{url()->previous()}}"
                               class="md-btn md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
@section('d-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{asset('assets/admin/js/wysiwyg.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>

        $(document).ready(function () {
            //     $('.select2').select2();
            //     $(".select2").select2({ width: '100%' });

            function initializeSelect2(selector, model) {
                $(selector).select2({
                    ajax: {
                        url: function () {
                            let type = model.split('\\').pop().toLowerCase() + 's';
                            return '{{ url('admin/homeconfigs/featured/items') }}/' + type;
                        },
                        dataType: 'json',
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {id: item.id, text: item.title??item.item_name??item.name};
                                })
                            };
                        }
                    }
                }).on('select2:select', function (e) {
                    $('#model_type').val(model);
                    submitFeaturedForm($(this).val());
                });
            }

            function submitFeaturedForm(modelId) {
                let modelType = $('#model_type').val();
                console.log("model type =>",modelType)
                $.ajax({
                    url: $('#featuredForm').attr('action'),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        featureable_type: modelType,
                        featureable_id: modelId
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (response) {
                        alert('Failed to add featured item.');
                    }
                });
            }

            initializeSelect2('#ads', 'App\\Models\\Ads');
            initializeSelect2('#articles', 'App\\Models\\Article');
            initializeSelect2('#books', 'App\\Models\\Book');
            initializeSelect2('#services', 'App\\Models\\Service');

            $('#saveOrder').on('click', function (e) {

                var orderedIds = $('#sortable').sortable('toArray', {attribute: 'data-id'});
                console.log("ordered ids =>", orderedIds)
                $.ajax({
                    url: '{{ route('home.admin.featured.updateOrder') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        orderedIds: orderedIds
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Order saved successfully');
                        } else {
                            alert('Failed to save order');
                        }
                    }
                });
            });
            $('#sortable').sortable({
                placeholder: "ui-state-highlight"
            });
            $("#sortable").disableSelection();
        });
    </script>
@endsection
