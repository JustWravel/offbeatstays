<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Location;
use App\Models\State;

class StateLocationsComponent extends Component
{
	// public $countries;
    public $states;
    public $locations;

    // public $selectedCountry = null;
    public $selectedState = null;
    public $selectedLocation = null;

    public function mount($selectedLocation = null)
    {
        // $this->countries = Country::all();
        $this->states = State::all();
        $this->locations = collect();
        $this->selectedLocation = $selectedLocation;

        if (!is_null($selectedLocation)) {
            $location = Location::find($selectedLocation);
            if ($location) {
                $this->locations = Location::where('state_id', $location->state_id)->get();
                // $this->states = State::where('country_id', $city->state->country_id)->get();
                // $this->selectedCountry = $city->state->country_id;
                $this->selectedState = $location->state_id;
            }
        }
    }



    public function render()
    {
        return view('livewire.admin.state-locations-component');
    }

    // public function updatedSelectedCountry($country)
    // {
    //     $this->states = State::where('country_id', $country)->get();
    //     $this->selectedState = NULL;
    // }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->locations = Location::where('state_id', $state)->get();
        }
    }
}
