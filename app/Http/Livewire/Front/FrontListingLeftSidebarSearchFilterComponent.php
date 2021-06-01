<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Category;
use App\Models\State;
use App\Models\PropertyRoom;

class FrontListingLeftSidebarSearchFilterComponent extends Component
{
    public $states, $categories, $maxprice, $minprice, $price_min, $price_max;
    public function mount()
    {
        
        $this->states = State::has('properties')->with('locations')->get();
        $this->categories = Category::has('properties')->get();
        $this->maxprice = PropertyRoom::max('cost_per_night');
        $this->minprice = PropertyRoom::min('cost_per_night');
    }
    public function render()
    {
        return view('livewire.front.front-listing-left-sidebar-search-filter-component');
    }
}
