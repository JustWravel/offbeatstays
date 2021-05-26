<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Property;
use App\Models\State;
use App\Models\Location;
use App\Models\Category;

class ListingComponent extends Component
{
	public $sortby;
	public $stay_location;
	public $stay_type;
	public $state;
	public $location;
	public $category;
	protected $queryString = ['stay_location', 'stay_type', 'sortby'];

	public function mount(){
		$this->state = State::where(['slug'=>$this->stay_location])->first();
    	$this->location = Location::where(['slug'=>$this->stay_location])->first();
    	$this->category = Category::where(['slug'=>$this->stay_type])->first();
	}
	// public function sortbyUpdated($name, $value)
	// {
	// 	// dd($name);
	// 	$this->sortby = $value;
	// }
    public function render()
    {
    	
    	// dd($location_id);


    	// dd($this->stay_location);
        return view('livewire.front.listing-component')->layout('layouts.front.base');

    }
}
