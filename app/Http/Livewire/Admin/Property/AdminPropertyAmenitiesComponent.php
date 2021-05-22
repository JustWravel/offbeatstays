<?php

namespace App\Http\Livewire\Admin\Property;

use Livewire\Component;
use App\Models\Property;
use App\Models\Amenity;

class AdminPropertyAmenitiesComponent extends Component
{
	protected $listeners = ['AdminPropertyAmenitiesComponent' => '$refresh'];
	public $property;
	public $amenities;
	public $amenity;


	public function mount($property_id='')
	{
		$this->property = Property::find($property_id);
		
		$this->amenities = Amenity::all();
		
		$this->amenity = (array)json_decode($this->property->amenity);
	}

	public function saveAmenity()
	{
		$property = $this->property;
		$property->amenity = json_encode($this->amenity);
		$property->save();
		$this->emit('AdminPropertyAmenitiesComponent');
		// dd(array_values($this->amenity));
		// $this->amenity = null;
		
	}
    public function render()
    {
        return view('livewire.admin.property.admin-property-amenities-component');
    }
}
