<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Property;
use App\Models\State;
use App\Models\Location;

class ListingComponent extends Component
{
	public $sortby;
	protected $queryString = ['sortby'];

	// public function mount(){
	// 	$this->stay_location="";
	// }
	public function sortbyUpdated($name, $value)
	{
		// dd($name);
		$this->sortby = $value;
	}
    public function render()
    {
    	// $state_id = State::where(['slug'=>$this->stay_location])->get();
    	// $location_id = Location::where(['slug'=>$this->stay_location])->get();
    	// dd($location_id);


    	// dd($this->stay_location);
        return view('livewire.front.listing-component')->layout('layouts.front.base');

    }
}
