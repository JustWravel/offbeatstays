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
	public $cancellationpolicy;
	


	public function mount($property_id='')
	{
		$this->property = Property::find($property_id);
		$this->check_in = $this->property->check_in;
		$this->check_out = $this->property->check_out;
		$this->breakfast_cost = $this->property->breakfast_cost;
		$this->lunch_cost = $this->property->lunch_cost;
		$this->dinner_cost = $this->property->dinner_cost;
		$this->cancellationpolicy = $this->property->cancellation_policy;
		
		
	}
	public function saveMiscellaneous()
	{
		// dd($this->cancellationpolicy);
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
        $this->property->cancellation_policy = $this->cancellationpolicy;
        $this->property->save();
		
		
	}
    public function render()
    {
        return view('livewire.admin.property.admin-property-miscellaneous-component');
    }
}
