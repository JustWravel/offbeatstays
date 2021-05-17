<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\State;
use App\Models\Property;

class HomeComponent extends Component
{
	public $popular_destinations;
	public $recently_added_properties;

	public function mount()
	{
		$this->popular_destinations = State::has('properties')->with('properties')->with('locations')->get()->sortByDesc(function($state){
			    return $state->properties->count();
			});

		$this->recently_added_properties = Property::latest()->take(5)->get();
		// dd($this->popular_destinations);
	}
	
    public function render()
    {

    	// dd($response);
        return view('livewire.front.home-component')->layout('layouts.front.base');
    }
}
