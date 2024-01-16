@if ($paginator->hasPages())
    <nav class="pagination-x">
        <ul>
            @if ($paginator->onFirstPage())
                <li class="prev-btn" aria-label="@lang('pagination.previous')">
                    <span class="val">{{ '<' }}</span>
                </li>
            @else
                <li class="prev-btn">
                    <a href="{{ $paginator->previousPageUrl() }}" class="val" rel="prev" aria-label="@lang('pagination.previous')">{{ '<' }}</a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <span>{{ $element }}</span>
                    </li>
                @endif --}}
                @if (is_array($element))
                    @foreach ($element as $page => $link_page)
                        @if ($page === $paginator->currentPage())
                            <li class="slide-btn active" aria-current="page">
                                <span class="val">{{ $page }}</span>
                            </li>
                        @else
                            <li class="slide-btn">
                                <a href="{{ $link_page }}" class="val">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="next-btn">
                    <a href="{{ $paginator->nextPageUrl() }}" class="val" rel="next" aria-label="@lang('pagination.next')">{{ '>' }}</a>
                </li>
            @else
                <li class="next-btn" aria-label="@lang('pagination.next')">
                    <span class="val">{{ '>' }}</span>
                </li>
            @endif
        </ul>
    </nav>
@endif