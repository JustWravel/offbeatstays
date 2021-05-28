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
		$this->popular_destinations = State::has('properties')->with('properties')->withCount('properties')->with('locations')->orderBy('properties_count', 'desc')->take(6)->get();

		$this->recently_added_properties = Property::first()->take(10)->get();
		// dd($this->popular_destinations);
	}
	
    public function render()
    {

    	// dd($response);
        return view('livewire.front.home-component')->layout('layouts.front.base');
    }
}
