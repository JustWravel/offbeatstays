<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyRoom;

class PropertyDetailComponent extends Component
{
    public $name;
	public $slug;
    public $room_id = 1;
    public $property;
    public $similar_properties;

	public function mount($slug)
	{
        $this->slug = $slug;
        $this->property = Property::with(
            'state','location', 'category', 'image'
        )->where('slug', $this->slug)->first();
        $this->similar_properties = Property::with(
            'state','location', 'category', 'image'
        )->where('state_id', $this->property->state->id)->take(4)->get();
		
        
	}
    public function addHello()
    {
       dd($this->slug);
    }
    public function roomDetail($room_id)
    {
        $this->room_id = $room_id;
        
        
    }

    
    public function render()
    {
    	
        return view('livewire.front.property-detail-component')->layout('layouts.front.base');
    }
}
