<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Amenity;

class FrontPropertyDetailAmenityShowByIdComponent extends Component
{
	public $amenity; 
	public $withname = true; 

	public function mount($amenity_id='', $withname=true)
	{
		$this->amenity = Amenity::find($amenity_id);
		$this->withname = $withname;
	}
    public function render()
    {
        return view('livewire.front.front-property-detail-amenity-show-by-id-component');
    }
}
