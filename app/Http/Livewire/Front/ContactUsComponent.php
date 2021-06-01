<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Query;

class ContactUsComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comments;

    public function resetForm()
    {
       $this->name = '';
       $this->email = '';
       $this->phone = '';
       $this->comments = '';
    }

    public function save()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'nullable|email',
            'phone'=>'required|numeric|digits:10',
            'comments'=>'nullable',
            
            
        ]);


        $query = new Query;
        $query->name = $this->name;
        $query->email = $this->email;
        $query->phone = $this->phone;
        $query->comments = $this->comments ?? ' ';

        $query->save();
        $this->resetForm();
        // session()->flash('message', 'Query Submitted successfully.');
        $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Query Submitted successfully."
            ]);


        
        
    }
    public function render()
    {
        return view('livewire.front.contact-us-component')->layout('layouts.front.base');
    }
}
