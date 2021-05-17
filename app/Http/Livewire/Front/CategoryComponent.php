<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{
	public $slug;

	public function mount($slug)
	{
		$this->slug = $slug;
	}
    public function render()
    {
    	$category = Category::where('slug', $this->slug)->first();
        return view('livewire.front.category-component', [
        				'category' => $category,
        			])->layout('layouts.front.base');
    }
}
