<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Location;
use App\Models\Property;

class LocationComponent extends Component
{
	public $slug;
   

	public function mount($slug)
	{
		$this->slug = $slug;
	}


    
    public function render()
    {
    	$location = Location::where('slug', $this->slug)->first();
    	$properties = Property::where('location_id', $location->id)->paginate(8);
        return view('livewire.front.location-component', [
        				'location' => $location,
        				'properties' => $properties,
        			])->layout('layouts.front.base');
    }
    
}
