<div>
	@if ($paginator->hasPages())
		<div class="pagination">
			@if ($paginator->onFirstPage())
			
			@else
                    
                    <button type="button" wire:click.prevent="previousPage" wire:loading.attr="disabled" rel="prev" class="btn btn-primary"> <i class="fa fa-caret-left"></i> Previous Page </button>
                    
            @endif
			 &nbsp;
			 <span> You are viewing Page : {{$paginator->currentpage()}} of total :{{$paginator->lastPage()}} </span>
		    @if ($paginator->hasMorePages())
		    	
                   <button type="button" wire:click.prevent="nextPage" wire:loading.attr="disabled" rel="next" class="btn btn-primary">Next Page <i class="fa fa-caret-right"></i></button>

                @else
                    
                @endif
		    {{-- <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a> --}}
		</div>
	@endif
    
</div>
