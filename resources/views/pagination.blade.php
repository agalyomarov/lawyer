@if ($paginator->hasPages())
    <div class="button-container pagination-container">
        @if ($paginator->currentPage() != 1)
            <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}">« Предыдущая</a>
        @endif
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page" class="page-numbers current">{{ $page }}</span>
                    @else
                        <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
            @if (is_string($element))
                <span class="page-numbers dots">…</span>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}">Следующая »</a>
        @endif
    </div>
@endif

{{-- <div class="button-container pagination-container">
   <a class="prev page-numbers" href="https://a-advokat.ru/news///page/2/">« Предыдущая</a>
            <span aria-current="page" class="page-numbers current">1</span>
            <a class="page-numbers" href="https://a-advokat.ru/news//page/2/">2</a>
            <a class="page-numbers" href="https://a-advokat.ru/news//page/3/">3</a>
            <span class="page-numbers dots">…</span>
            <a class="page-numbers" href="https://a-advokat.ru/news//page/9/">9</a>
            <a class="next page-numbers" href="https://a-advokat.ru/news//page/2/">Следующая »</a>
        </div> --}}
