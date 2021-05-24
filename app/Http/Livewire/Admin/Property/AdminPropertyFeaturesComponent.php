<?php

namespace App\Http\Livewire\Admin\Property;

use Livewire\Component;
use App\Models\Property;
use App\Models\Feature;

class AdminPropertyFeaturesComponent extends Component
{
	public $property;
	public $features;
	public $feature;

	public function mount($property_id='')
	{
		$this->property = Property::find($property_id);
		
		$this->features = Feature::all();
		
		$this->feature = (array)json_decode($this->property->feature);
	}

	public function saveFeature()
	{
		$property = $this->property;
		$property->feature = json_encode($this->feature);
		$property->save();
		// $this->emit('AdminPropertyAmenitiesComponent');
		// dd(array_values($this->amenity));
		// $this->amenity = null;
		
	}

    public function render()
    {
        return view('livewire.admin.property.admin-property-features-component');
    }
}
