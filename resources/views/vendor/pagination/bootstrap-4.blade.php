<style>
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 8px;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.pagination .page-item {
    margin: 0;
}

.pagination .page-link {
    display: block;
    padding: 10px 16px;
    color: #51223a;
    background-color: #fff;
    border: 2px solid #51223a;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    min-width: 44px;
    text-align: center;
}

.pagination .page-link:hover {
    background-color: #51223a;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(81, 34, 58, 0.3);
}

.pagination .page-item.active .page-link {
    background-color: #51223a;
    color: #fff;
    border-color: #51223a;
}

.pagination .page-item.disabled .page-link {
    color: #999;
    background-color: #f5f5f5;
    border-color: #ddd;
    cursor: not-allowed;
    opacity: 0.6;
}

.pagination .page-item.disabled .page-link:hover {
    transform: none;
    box-shadow: none;
    background-color: #f5f5f5;
    color: #999;
}
</style>

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

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
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
