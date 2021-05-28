<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\State;

class AllStatesComponent extends Component
{
    public function render()
    {
        return view('livewire.front.all-states-component', [
        				'states' => State::has('properties')->with('properties')->withCount('properties')->with('locations')->orderBy('properties_count', 'desc')->get()
        			])->layout('layouts.front.base');
    }
}
