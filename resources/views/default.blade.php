@if ($paginator->hasPages())
    <div class="wpcr3_pagination">
        <div class="wpcr3_pagination_page">Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }}: </div>

        @if ($paginator->onFirstPage())
            <div class="wpcr3_a wpcr3_disabled">&laquo;</div>&nbsp;
            <div class="wpcr3_a wpcr3_disabled">&lsaquo;</div>&nbsp;
        @else
            <a style="display: block" href="{{ $paginator->url(1) }}" class="wpcr3_a">&laquo;</a>&nbsp;
            <a style="display: block" href="{{ $paginator->previousPageUrl() }}" class="wpcr3_a">&lsaquo;</a>&nbsp;
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="wpcr3_a">{{ $element }}</div>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="wpcr3_a wpcr3_current">{{ $page }}</div>
                    @else
                        <a style="display: block" href="{{ $url }}" class="wpcr3_a">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a style="display: block" href="{{ $paginator->nextPageUrl() }}" class="wpcr3_a">&rsaquo;</a>&nbsp;
            <a style="display: block" href="{{ $paginator->url($paginator->lastPage()) }}" data-page="5" class="wpcr3_a">&raquo;</a>&nbsp;
        @else
            <div class="wpcr3_a wpcr3_disabled">&rsaquo;</div>&nbsp;
            <div class="wpcr3_a wpcr3_disabled">&raquo;</div>&nbsp;
        @endif
    </div>
@endif
