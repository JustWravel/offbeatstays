<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\State;
use App\Models\Property;

class StateComponent extends Component
{
	public $slug;
    
   

	public function mount($slug)
	{
		$this->slug = $slug;
        // $this->sortby = $sortby;
	}

    


    
    public function render()
    {
    	$state = State::where('slug', $this->slug)->first();
    	$properties = Property::with('state', 'location', 'category')->where('state_id', $state->id)->paginate(8);
        return view('livewire.front.state-component', [
        				'state' => $state,
        				'properties' => $properties,
        			])->layout('layouts.front.base');
    }
}
