@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{!! __('Pagination Navigation') !!}" class="flex justify-between items-center mt-6">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-300 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none transition-colors duration-200 cursor-not-allowed select-none">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none transition-colors duration-200">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none transition-colors duration-200">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="inline-flex items-center px-4 py-2 text-sm font-semibold  bg-blue-600 text-gray-300 rounded-lg hover:bg-blue-700 focus:outline-none transition-colors duration-200 cursor-not-allowed select-none">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif