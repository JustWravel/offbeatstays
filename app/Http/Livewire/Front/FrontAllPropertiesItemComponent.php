<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;

class FrontAllPropertiesItemComponent extends Component
{
    use WithPagination;
    public $perPage;
    public $perPage1;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function mount()
    {
        $this->perPage = 8;
        
    }


    public function loadMore()
    {
        // dd('sdfsdf');
        $this->perPage = $this->perPage + 8;
    }
    public function render()
    {
        $properties = Property::with('state', 'location', 'category', 'images')->paginate($this->perPage);
        
        return view('livewire.front.front-all-properties-item-component', [
                        'properties' => $properties,
                    ]);
    }
}
