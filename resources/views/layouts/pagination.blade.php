@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="py-2">
    {{-- Mobile View --}}
    <div class="md:hidden flex">
        <div class="w-1/3 flex items-center">
            @if ($paginator->onFirstPage())
            <div></div>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-1 py-0 text-xs font-semibold text-gray-600 bg-white border border-gray-300 rounded">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
            @endif
        </div>

        <div class="w-1/3 flex items-center">
            <div class="w-full px-1 py-1 text-xs text-center font-gray-600 font-semibold uppercase">
                Page {{$paginator->currentPage()}} of {{$paginator->lastPage()}}
            </div>
        </div>

        <div class="w-1/3 flex items-center justify-end">
            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-1 py-0 text-xs font-semibold text-gray-600 bg-white border border-gray-300 rounded">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
            @else
            <div></div>
            @endif
        </div>
    </div>

    {{-- Desktop view --}}
    <div class="hidden md:flex">
        <div class="flex items-center w-1/2 text-xs text-gray-500 font-medium uppercase truncate">
            @if($paginator->firstItem() == $paginator->lastItem())
            Showing Page {{ $paginator->firstItem() }} of {{ $paginator->total() }}
            @else
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
            @endif
        </div>

        <div class="w-1/2">
            <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-end">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <div>
                    <span class="bg-white border border-r-0 text-xs text-gray-400 px-2 py-1 rounded-l">
                        Previous
                    </span>
                </div>
                @else
                <div>
                    <a href="{{ $paginator->previousPageUrl() }}" class="bg-white border border-r-0 text-xs text-gray-600 px-2 py-1 rounded-l">
                        Previous
                    </a>
                </div>
                @endif

                @foreach ($elements as $element)
                @if (is_string($element))
                <div>
                    <span class="bg-white border border-r-0 text-xs text-gray-600 px-2 py-1">
                        {{ $element }}
                    </span>
                </div>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <div>
                    <span class="bg-blue-500 border border-blue-500 text-xs text-white px-2 py-1 -pl-px">
                        {{ $page }}
                    </span>
                </div>
                @else
                <div>
                    <a href="{{ $url }}" class="bg-white border border-r-0 text-xs text-gray-600 px-2 py-1 ">
                        {{ $page }}
                    </a>
                </div>
                @endif
                @endforeach
                @endif

                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <div>
                    <a href="{{ $paginator->nextPageUrl() }}" class="bg-white border text-xs text-gray-600 px-2 py-1 rounded-r">
                        Next
                    </a>
                </div>
                @else
                <div>
                    <span class="bg-white border text-xs text-gray-400 px-2 py-1 rounded-r">
                        Next
                    </span>
                </div>
                @endif
            </nav>
        </div>
    </div>



    <div class="hidden ">
        <div>
            <p class="text-xs text-gray-500 font-semibold leading-tight">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
            </p>
        </div>

        <div>
            <span class="relative z-0 inline-flex shadow-sm">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
                @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <span aria-disabled="true">
                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                </span>
                @else
                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                </a>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif