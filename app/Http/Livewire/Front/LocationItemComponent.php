<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Location;
use App\Models\Property;
use Livewire\WithPagination;

class LocationItemComponent extends Component
{
	use WithPagination;
	public $slug;
    public $perPage;
    public $perPage1;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount($slug)
	{
		$this->slug = $slug;
		$this->perPage = 8;
		
	}


    public function loadMore()
    {
    	// dd('sdfsdf');
        $this->perPage = $this->perPage + 8;
    }
    public function render()
    {
    	$location = Location::where('slug', $this->slug)->first();
    	$properties = Property::where('location_id', $location->id)->paginate($this->perPage);
        return view('livewire.front.location-item-component', [
        				'location' => $location,
        				'properties' => $properties,
        			]);
    }

}
