<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\State;
use App\Models\Property;
use \Cache;

class HomeComponent extends Component
{
	public $popular_destinations;
	public $recently_added_properties;

	public function mount()
	{
		$this->popular_destinations = State::has('properties')->withCount('properties')->orderBy('properties_count', 'desc')->take(6)->get();

		$this->recently_added_properties = Cache::remember('articles', 60, function() {
			return Property::with('state', 'location', 'image', 'category')->take(6)->get();
		});
		// dd($this->popular_destinations);
	}
	
    public function render()
    {

    	// dd($response);
        return view('livewire.front.home-component')->layout('layouts.front.base');
    }
}
