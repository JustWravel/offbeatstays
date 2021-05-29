<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Category;
use App\Models\Property;
use Livewire\WithPagination;

class CategoryItemComponent extends Component
{
    use WithPagination;
	public $slug;
    public $perPage;
    public $perPage1;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount($slug)
	{
		$this->slug = $slug;
		$this->perPage = 8;
		
	}


    public function loadMore()
    {
    	// dd('sdfsdf');
        $this->perPage = $this->perPage + 8;
    }
    public function render()
    {
    	$category = Category::where('slug', $this->slug)->first();
    	$properties = Property::with('state', 'location', 'category', 'images')->where('category_id', $category->id)->paginate($this->perPage);
    	
        return view('livewire.front.category-item-component', [
        				'category' => $category,
        				'properties' => $properties,
        			]);
    }
}
