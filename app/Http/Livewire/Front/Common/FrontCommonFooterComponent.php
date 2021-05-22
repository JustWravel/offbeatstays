<?php

namespace App\Http\Livewire\Front\Common;

use Livewire\Component;
use App\Models\Subscriber;

class FrontCommonFooterComponent extends Component
{
	public $email;

	public function subscribe()
	{
		$this->validate([
			'email' => 'required|email|unique:subscribers,email'
		]);
		// dd($this->email);
		Subscriber::create(['email'=>$this->email]);
		session()->flash('message', 'You have subscribed Offbeatstays.in!');
		$this->email = '';
	}
    public function render()
    {
        return view('livewire.front.common.front-common-footer-component');
    }
}
