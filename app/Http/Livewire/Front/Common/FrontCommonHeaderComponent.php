<?php

namespace App\Http\Livewire\Front\Common;

use Livewire\Component;
use App\Models\State;
use App\Models\Category;

class FrontCommonHeaderComponent extends Component
{
	public $states;
	public $categories;
	public function mount()
	{
		$this->states = State::has('properties')->with('properties')->get();
		$this->categories = Category::has('properties')->with('properties')->get();
	}
    public function render()
    {
        return view('livewire.front.common.front-common-header-component');
    }
}
