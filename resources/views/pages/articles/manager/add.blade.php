@extends('layouts.admin.dashboard')
@section('title','Add New Article')
@section('d-content')
    <form action="{{route('article.admin.store')}}" method="POST" class="ajax" id="brandStore" enctype="multipart/form-data">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Add New Article
                        </h3>
                    </div>
                    <div class="md-card-content">
                        @include('pages.articles.manager.partials.form')
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-2-3">
                        <button class="md-btn md-btn-primary md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light"
                                type="submit">
                            Submit
                        </button>
                    </div>
                    <div class="uk-width-medium-1-3">
                        <a href="{{url()->previous()}}" class="md-btn md-btn-block md-btn-large md-btn-wave-light waves-effect waves-button waves-light">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('d-scripts')
    <script src="{{asset('assets/admin/js/wysiwyg.js')}}"></script>
    <script src="{{asset('assets/admin/js/uikit_fileinput.js')}}"></script>
    <script>
        $("input#status").on('change', function () {
            if ($(this).prop("checked") === true) {
                $("input[type='hidden'][name='status_id']").val(1);
            } else {
                $("input[type='hidden'][name='status_id']").val(2);
            }
        })
    </script>
        <script>
            $(function () {
                altair_form_adv.date_range()
            }), altair_form_adv = {
                date_range: function () {
                    var t = $("#uk_dp_start"), e = $("#uk_dp_end"), i = UIkit.datepicker(t, {format: "YYYY-MM-DD"}),
                        n = UIkit.datepicker(e, {format: "YYYY-MM-DD"});
                    t.on("change", function () {
                        n.options.minDate = t.val(), setTimeout(function () {
                            e.focus()
                        }, 300)
                    }), e.on("change", function () {
                        i.options.maxDate = e.val()
                    })
                }
            };
        </script>


@endsection
