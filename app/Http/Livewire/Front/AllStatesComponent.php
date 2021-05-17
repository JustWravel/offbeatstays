<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\State;

class AllStatesComponent extends Component
{
    public function render()
    {
        return view('livewire.front.all-states-component', [
        				'states' => State::all()
        			])->layout('layouts.front.base');
    }
}
