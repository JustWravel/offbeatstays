<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\State;
use App\Models\Category;
use App\Models\Location;

class FrontHomeMainSearchComponent extends Component
{
	public $states;
	public $locations;
	public $categories;
	public function mount()
	{
		$this->states = State::has('properties')->get();
		$this->locations = Location::has('properties')->get();
		$this->categories = Category::has('properties')->get();
		// dd($this->categories);
	}
    public function render()
    {
        return view('livewire.front.front-home-main-search-component');
    }
}
