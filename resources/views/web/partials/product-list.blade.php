<div class="row justify-content-center">
    @foreach ($products as $product)
        @include('web.partials.product-card', ['product' => $product])
    @endforeach
</div>

@if ($products->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination">
            @if ($products->onFirstPage())
                <li class="page-item disabled"><a class="page-link">Prev</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">Prev</a></li>
            @endif

            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($products->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a></li>
            @else
                <li class="page-item disabled"><a class="page-link">Next</a></li>
            @endif
        </ul>
    </nav>
@endif
