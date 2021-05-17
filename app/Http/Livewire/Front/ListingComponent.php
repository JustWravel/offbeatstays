<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class ListingComponent extends Component
{
	public $name;

	public function mount(){
		$this->name="";
	}
    public function render()
    {
        return view('livewire.front.listing-component')->layout('layouts.front.base');
    }
}
