<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Property;

class FrontAllPropertiesComponent extends Component
{
    public function render()
    {
        $properties = Property::paginate(1);
        return view('livewire.front.front-all-properties-component', [
                        'properties' => $properties,
                    ])->layout('layouts.front.base');
    }
}
