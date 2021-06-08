<?php

namespace App\Http\Livewire\Admin\Property;

use Livewire\Component;
use App\Models\Property;

class AdminPropertyMiscellaneousComponent extends Component
{
	public $property;
	public $check_in;
	public $check_out;
	public $breakfast_cost;
	public $lunch_cost;
	public $dinner_cost;
	public $cancellation_policy;
	


	public function mount($property_id='')
	{
		$this->property = Property::find($property_id);
		$this->check_in = $this->property->check_in;
		$this->check_out = $this->property->check_out;
		$this->breakfast_cost = $this->property->breakfast_cost ?? 0;
		$this->lunch_cost = $this->property->lunch_cost ?? 0;
		$this->dinner_cost = $this->property->dinner_cost ?? 0;
		$this->cancellation_policy = $this->property->cancellation_policy;
		
		
	}
	public function saveMiscellaneous()
	{
		// dd($this->cancellation_policy);
		$this->validate([
            'breakfast_cost' => 'numeric',
            'lunch_cost' => 'numeric',
            'dinner_cost' => 'numeric',
            // 'state_id' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $this->property->check_in = $this->check_in;
        $this->property->check_out = $this->check_out;
        $this->property->breakfast_cost = $this->breakfast_cost;
        $this->property->lunch_cost = $this->lunch_cost;
        $this->property->dinner_cost = $this->dinner_cost;
        $this->property->cancellation_policy = $this->cancellation_policy;
        // dd($this->property);
        $this->property->save();
		
		
	}
    public function render()
    {
        return view('livewire.admin.property.admin-property-miscellaneous-component');
    }
}
