@if($paginator->lastPage() > 1)
    <ul>
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="frist" href="{{ $paginator->url($paginator->currentPage() - 1) }}">Prev</a>
        </li>
        @for($i=1;$i<=$paginator->lastPage();$i++)
            <li>
                <a class="{{ ($paginator->currentPage() == $i) ? ' frist' : '' }}" href="{{ $paginator->url($i) }}">
                    {{ $i }}
                </a>
            </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="last" href="{{ $paginator->url($paginator->currentPage() + 1) }}">Next</a>
        </li>
    </ul>
@endif