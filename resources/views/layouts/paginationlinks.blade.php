@if ($paginator->hasPages())
<ul class="pagination">
    {{-- precedent --}}
    @if ($paginator->onFirstPage())
         <li class="page-item disabled"><a  class="page-link"><span>&laquo;</span></a></li>
    @else
         <li class="page-item"><a href="{{  $paginator->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></li>
    @endif
    {{-- fin --}}

    {{-- pagination element here! --}}
       @foreach ($elements as $element)
          @if (is_string($element))
              <li class="page-item disabled"><a class="page-link"><span>{{ $element }}</span></a></li>
          @endif

          {{-- link array here --}}
          @if (is_array($element))
            @foreach ($element as $page=>$url)
                @if($page == $paginator->currentPage())
                  <li class="page-item active"><a href="" class="page-link"><span>{{ $page }}</span></a></li>
                 @else
                  <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                @endif
            @endforeach
              
          @endif
          
           
       @endforeach
    {{-- end --}}
    
    {{-- next page link --}}
    @if ($paginator->hasMorePages())
         <li class="page-item"><a href="{{ $paginator->nextPageUrl()}}" class="page-link"><span>&raquo;</span></a></li>
      @else
          <li class="page-item disabled"><a class="page-link"><span>&raquo;</span></a></li>
    @endif
</ul>
    
@endif