<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Category;
use App\Models\Property;

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
        $properties = Property::where('category_id', $category->id)->paginate(1);
        return view('livewire.front.category-component', [
                        'category' => $category,
                        'properties' => $properties,
                    ])->layout('layouts.front.base');
    }
}
