<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Property;
use App\Models\State;
use App\Models\Location;
use App\Models\Category;


class ListingItemComponent extends Component
{
	use WithPagination;
	public $stay_location;
	public $stay_type;
	public $sortby;
	protected $queryString = ['stay_location', 'stay_type', 'sortby'];

	// public function getQueryString()
 //    {
 //        return ['stay_location', 'stay_type', 'sortby'];
 //    }
	public function sortbyUpdated($name, $value)
	{
		dd($value);
		$this->sortby = $value;
	}
    public function render()
    {

    	$state = State::where(['slug'=>$this->stay_location])->first();
    	$location = Location::where(['slug'=>$this->stay_location])->first();
    	$category = Category::where(['slug'=>$this->stay_type])->first();
    	$properties = Property::orwhere([
        		'category_id'=>$category->id ?? '',
        		'state_id'=>$state->id ?? '',
        		'location_id'=>$location->id ?? '',
        	])->with('rooms')->paginate(9);
    	if($this->sortby == 'pricedesc'){
    		$properties = $properties->sortByDesc('price');
    	}
    	elseif($this->sortby == 'priceasc'){
    		$properties = $properties->sortBy('price');
    	}
    	// dd($properties);


        return view('livewire.front.listing-item-component', [
        	'properties' => $properties,
        ]);
    }
}
