<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\State;
use App\Models\Property;
use Livewire\WithPagination;

class FrontListingCardListWithLoadMoreComponent extends Component
{
	use WithPagination;
	public $slug;
    public $perPage = 2;
    public $perPage1;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

	public function mount($slug)
	{
		$this->slug = $slug;
	}


    public function loadMore()
    {
    	// dd('sdfsdf');
        $this->perPage = $this->perPage + 10;
    }
    public function render()
    {
    	$state = State::where('slug', $this->slug)->first();
    	$properties = State::latest()->paginate(2);
    	// $properties = Property::where('state_id', $state->id)->paginate(2);
        return view('livewire.front.front-listing-card-list-with-load-more-component', [
        				'state' => $state,
        				'properties' => $properties,
        			]);
    }
}
