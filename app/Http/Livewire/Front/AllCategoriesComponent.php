<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Category;

class AllCategoriesComponent extends Component
{
    public function render()
    {
        return view('livewire.front.all-categories-component', [
        				'categories' => Category::all()
        			])->layout('layouts.front.base');
    }
}
