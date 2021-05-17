<?php

namespace App\Http\Livewire\Admin\Property;

use Livewire\Component;
use App\Models\Location;
use App\Models\State;
use App\Models\Category;
use App\Models\Property;

class AdminPropertyBasicInfoComponent extends Component
{
	// protected $listeners = ['basicInfo' => '$refresh'];
	public $property;
	public $categories;
	public $states;
    public $locations;

	public $name;
	public $description;
	public $meta_title;
	public $meta_description;
	public $meta_keywords;

	public $basicInfoRerunJs = false;


	public $selectedState;
	public $selectedLocation;
	public $selectedCategory;


	public $property_id;
    // public $email;

    /*protected $rules = [
        // 'name' => 'required|max:255',
        'name' => 'required|max:255|unique:properties,name,'.$this->property_id,
        // 'email' => 'required|email',
    ];*/

 //    public function updatingName($value)
	// {
	// 	$this->name = $value;
	// 	$this->basicInfoRerunJs = true;
	// }

	public function mount($property_id=null)
	{
		$this->property = Property::find($property_id);
		$this->categories = Category::all();
		$this->states = State::all();
        $this->locations = collect();
		$this->property_id= $property_id;
		$this->name = $this->property->name;
		$this->description = $this->property->description;
		$this->selectedState = $this->property->state_id;
		$this->selectedLocation = $this->property->location_id;
		$this->selectedCategory = $this->property->category_id;
		$this->meta_title = $this->property->meta_title;
		$this->meta_description = $this->property->meta_description;
		$this->meta_keywords = $this->property->meta_keywords;

		if (!is_null($this->selectedLocation)) {
            $location = Location::find($this->selectedLocation);
            if ($location) {
                $this->locations = Location::where('state_id', $location->state_id)->get();
                // $this->states = State::where('country_id', $city->state->country_id)->get();
                // $this->selectedCountry = $city->state->country_id;
                $this->selectedState = $location->state_id;
            }
        }
	}

	public function updatedSelectedState($state)
    {
    	// dd($state);
        if (!is_null($state)) {
            $this->locations = Location::where('state_id', $state)->get();
        }
    }

	public function save()
    {

    	// dd($this->property);
    	$this->validate([
            'name' => 'required|max:255|unique:properties,name,'.$this->property_id,
            // 'state_id' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
    	// echo $this->selectedState;
    	// dd($this->selectedState);
        $this->property->name = $this->name;
        $this->property->state_id = $this->selectedState;
        $this->property->location_id = $this->selectedLocation;
        $this->property->category_id = $this->selectedCategory;
        $this->property->description = $this->description;
        $this->property->meta_title = $this->meta_title;
        $this->property->meta_keywords = $this->meta_keywords;
        $this->property->meta_description = $this->meta_description;
        $this->property->save();
        // dd($this->property);
        
    }
    public function render()
    {
        return view('livewire.admin.property.admin-property-basic-info-component');
    }
}
