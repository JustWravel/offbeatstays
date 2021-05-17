<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class ContactUsComponent extends Component
{
    public function render()
    {
        return view('livewire.front.contact-us-component')->layout('layouts.front.base');
    }
}
