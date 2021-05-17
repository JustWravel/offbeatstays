<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class PropertyDetailRoomsComponent extends Component
{
	public $property;
	public $room_id = 0;

	public function mount($property)
	{
		$this->property = $property;
	}
	public function roomDetail($room_id)
    {
        $this->room_id = $room_id;
        // dd($room_id);
        
        // $this->room_id = $room_id;
        
    }
    public function render()
    {
        return view('livewire.front.property-detail-rooms-component');
    }
}
