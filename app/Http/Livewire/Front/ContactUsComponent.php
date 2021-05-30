<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class ContactUsComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comments;

    public function save()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            
            
        ]);

        dd($this->name);
        
    }
    public function render()
    {
        return view('livewire.front.contact-us-component')->layout('layouts.front.base');
    }
}
