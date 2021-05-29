<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Category;

class AllCategoriesComponent extends Component
{
    public function render()
    {
        return view('livewire.front.all-categories-component', [
        				'categories' => Category::has('properties')->withCount('properties')->orderBy('properties_count', 'desc')->get()
        			])->layout('layouts.front.base');
    }
}
