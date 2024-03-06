@if ($paginator->hasPages())
    <nav class="card p-2" aria-label="page navigation">
        <ul class="pagination patination-sm m-0 d-flex justify-content-between align-items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                <span class="page-link" aria-hidden="true"><i class="material-icons">chevron_left</i> {{ __('common.previous') }} </span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" data-placement="top" data-toggle="tooltip" href="{{ $paginator->previousPageUrl() }}" title="prev" data-original-title="{{ __('pagination.previous') }}"><span class="d-none d-sm-flex"><i class="material-icons">chevron_left</i>{{ __('common.previous') }}</span></a>
            </li>
        @endif
        <div class="d-flex">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" data-placement="top" data-toggle="tooltip" href="{{ $url }}" title="{{ __('common.page') }} {{ $page }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        </div>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" data-placement="top" data-toggle="tooltip" href="{{ $paginator->nextPageUrl() }}" title="Next" rel="next" aria-label="{{ __('pagination.next') }}" ><span class="d-none d-sm-flex">{{ __('common.next') }}</span><i class="material-icons">chevron_right</i></a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                <span class="page-link" aria-hidden="true">{{ __('common.next') }} <i class="material-icons">chevron_right</i></span>
            </li>
        @endif
        </ul>
    </nav>
@endif
