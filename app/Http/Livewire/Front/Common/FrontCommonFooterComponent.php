<?php

namespace App\Http\Livewire\Front\Common;

use Livewire\Component;
use App\Models\Subscriber;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\State;

class FrontCommonFooterComponent extends Component
{
	public $email;

	public $latestpost;
	public $categories;
	public $states;

	public function mount($value='')
	{
		$this->latestpost = BlogPost::latest()->take(4)->get();
		$this->categories = Category::withCount('properties')->orderBy('properties_count', 'desc')->take(10)->get();
		$this->states = State::withCount('properties')->orderBy('properties_count', 'desc')->take(10)->get();
	}

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
