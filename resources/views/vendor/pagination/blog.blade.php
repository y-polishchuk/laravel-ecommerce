<div class="blog-pagination">
@if ($paginator->hasPages())
    <ul class="justify-content-center">
       
        @if ($paginator->onFirstPage())
        <li class="disabled"><i class="icofont-rounded-left"></i></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="icofont-rounded-left"></i></a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a>{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="icofont-rounded-right"></i></a></li>
        @else
            <li class="disabled"><i class="icofont-rounded-right"></i></li>
        @endif
    </ul>
@endif 
</div>