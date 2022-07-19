@if ($paginator->hasPages())
    <div class="wpcr3_pagination">
        <a href="#" class="wpcr3_pagination_page">Страница 1 из 5: </a>

        @if ($paginator->onFirstPage())
            <div class="wpcr3_a">&laquo;</div>&nbsp;
            <div class="wpcr3_a">&lsaquo;</div>&nbsp;
        @else
            <div href="{{ $paginator->url(1) }}" class="wpcr3_a">&laquo;</div>&nbsp;
            <div href="{{ $paginator->previousPageUrl() }}" class="wpcr3_a">&lsaquo;</div>&nbsp;
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="wpcr3_a">{{ $element }}</div>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="wpcr3_a">{{ $page }}</div>
                    @else
                        <div href="{{ $url }}" class="wpcr3_a">{{ $page }}</div>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <div href="{{ $paginator->nextPageUrl() }}" class="wpcr3_a">&rsaquo;</div>&nbsp;
            <div href="{{ $paginator->url($paginator->lastPage()) }}" data-page="5" class="wpcr3_a">&raquo;</div>&nbsp;
        @else
            <div class="wpcr3_a">&rsaquo;</div>&nbsp;
            <div class="wpcr3_a ">&raquo;</div>&nbsp;
        @endif
    </div>
@endif
