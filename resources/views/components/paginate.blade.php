@if ($paginator->hasPages())
    <ul class="pager flex flex-row py-2">
        @if ($paginator->onFirstPage())
            <li class="disabled p-2 border rounded-tl-lg rounded-bl-lg hover:bg-gray-100  bg-white">
                <span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="">
                <li class="p-2 border border rounded-tl-lg rounded-bl-lg hover:bg-gray-100  bg-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </li>
            </a>

        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled py-2 px-3 border text-sm"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="bg-gray-100 py-2 px-3 border text-sm"><span>{{ $page }}</span></li>
                    @else
                        <a href="{{ $url }}"><li class="hover:bg-gray-100 py-2 px-3 border text-sm  bg-white">{{ $page }}</li></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="">
                <li class="p-2 border rounded-tr-lg rounded-br-lg hover:bg-gray-100  bg-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </li>
            </a>
        @else
            <li class="disabled p-2 border rounded-tr-lg rounded-br-lg hover:bg-gray-100  bg-white">
                <span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>
        @endif
    </ul>
@endif
