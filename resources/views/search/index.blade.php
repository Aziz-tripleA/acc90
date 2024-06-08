@extends('layouts.front')
@section('title','البحث')
@section('f-content')
    <div class="product-listing-contain sectionBotPad">
      <div class="product-listing-wrap sectionPad">
        <div class="product-result" style="width: calc(100% - 50px);">
          <div class="product-result-body">
            <div class="main-search-form">
                <form id="search-form">
                    <div class="form-group">
                        <input id="search-input"
                               class="form-input"
                               type="text"
                               placeholder="بحث…"/>
                        <img
                            class="input-floating-icon"
                            src="{{ asset('assets/images/icons/search.png') }}"
                            alt=""
                        />
                    </div>
                </form>
            </div>

              <div class="books-listing-body" id="search-results" style="padding-top: 5rem;overflow: auto; ">
              </div>

              <div id="pagination-links" style="display: flex;justify-content: center;margin-top: 1rem">
                  <button class="border-btn" style="display: none" id="load-more" data-page="1">اظهر المزيد</button>
              </div>
          </div>

        </div>
      </div>
    </div>

@endsection
@section('scripts')
    <script >
        $(document).ready(function () {

            $('#search-form').on('submit', function (e) {

                e.preventDefault();

                var query = $('#search-input').val();

                var csrfToken = "{{ csrf_token() }}";
                $.ajax({
                    type: 'POST',
                    url: '/search',
                    data: {_token: csrfToken, query: query},
                    success: function (data) {
                        $('#search-results').html(data.html)

                        if (data.pagination.has_more_pages) {
                            $('#load-more').css('display', 'block')
                            $('#load-more').data('page', data.pagination.current_page + 1);
                        } else {
                            $('#load-more').css('display', 'none')
                            $('#pagination-links').remove();
                        }
                    }
                });
            });
        });
        $(document).on('click', '#load-more', function (e) {
            e.preventDefault();
            var page = $(this).data('page');
            var query = $('#search-input').val();
            var csrfToken = "{{ csrf_token() }}";
            $.ajax({
                type: 'POST',
                url: '/search',
                data: {
                    page: page,
                    _token: csrfToken,
                    query: query
                },
                success: function (response) {
                    $('#search-results').append(response.html);

                    if (response.pagination.has_more_pages) {
                        $('#load-more').css("display","block")
                        $('#load-more').data('page', response.pagination.current_page + 1);
                    } else {
                        $('#load-more').css('display', 'none')
                        $('#pagination-links').remove();
                    }
                }
            });
        });
    </script>
@endsection

