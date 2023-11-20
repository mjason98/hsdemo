{{-- resources/views/vendor/pagination/simple-tailwind.blade.php --}}

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex gap-3 justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="bg-gray-200 w-10 h-10 text-center rounded-xl text-gray-800 text-3xl pagination-link-disabled">&lsaquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="hover:bg-gray-600 bg-gray-800 w-10 h-10 text-center rounded-xl text-white text-3xl pagination-link">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="bg-gray-800 w-10 h-10 text-center rounded-xl text-white text-3xl pagination-ellipsis">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="bg-rose-800 w-10 h-10 text-center rounded-xl text-white text-2xl pt-1 pagination-link-current">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="hover:bg-gray-600 bg-gray-800 w-10 h-10 text-center rounded-xl text-white text-2xl pt-1 pagination-link">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="hover:bg-gray-600 bg-gray-800 w-10 h-10 text-center rounded-xl text-white text-3xl pagination-link">&rsaquo;</a>
        @else
            <span class="bg-gray-200 w-10 h-10 text-center rounded-xl text-gray-800 text-3xl pagination-link-disabled">&rsaquo;</span>
        @endif
    </nav>
@endif