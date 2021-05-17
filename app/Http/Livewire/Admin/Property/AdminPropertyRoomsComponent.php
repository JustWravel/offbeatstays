<?php

namespace App\Http\Livewire\Admin\Property;

use Livewire\Component;
use App\Models\Property;
use App\Models\PropertyRoom;
use App\Models\Amenity;
use Livewire\WithFileUploads;
use Image;

class AdminPropertyRoomsComponent extends Component
{
    protected $listeners = ['refreshProperty' => '$refresh'];
    use WithFileUploads;
	public $property;
    public $propertyRooms;

	public $rooms;
    public $amenities;
    public $room_image;
    // public $amenity;
	

	public function mount($property_id = null)
    {
        $this->property = Property::find($property_id);
        $this->amenities = Amenity::all();
        
        
        // $this->propertyRooms = Property::find($property_id);
        // $this->rooms = [
        // 	'name' => 'Ghanshyam'
        // ];
        
        
    }

    public function clearAddRoomInput()
    {
        $this->rooms['name'] = '';
        $this->rooms['description'] = '';
    }

    public function addRoom(){
    	// dd($this->rooms);
        $this->validate([
            'rooms.name'=>'required',
            'rooms.description'=>'required',
        ]);
        $propertyroom = new PropertyRoom;
        $propertyroom->name = $this->rooms['name'];
        $propertyroom->description = $this->rooms['description'];
        $propertyroom->property_id = $this->property->id;
        $propertyroom->save();
        $this->clearAddRoomInput();
        $this->emit('roomAdded');
        $this->emit('refreshProperty');
        // $this->property = Property::find($property_id);

    }

    // public function updatedRoomsImages($roomImage)
    // {
    //     // $this->title = $roomname;
    //     dd($roomImage);
    // }


    public function editRoom($id){
        // dd($id);

        $rooms = PropertyRoom::find($id);
        // $this->rooms = $rooms;
        // dd($this->rooms);

        $this->rooms['id'] = $rooms->id;
        $this->rooms['name'] = $rooms->name;
        $this->rooms['description'] = $rooms->description;
        $this->rooms['cost_per_night'] = $rooms->cost_per_night;
        $this->rooms['cost_per_night_weekend'] = $rooms->cost_per_night_weekend;
        $this->rooms['cost_per_night_weekly'] = $rooms->cost_per_night_weekly;
        $this->rooms['cost_per_night_fortnightly'] = $rooms->cost_per_night_fortnightly;
        $this->rooms['cost_per_night_monthly'] = $rooms->cost_per_night_monthly;
        $this->rooms['breakfast_included'] = $rooms->breakfast_included;
        $this->rooms['amenity'] = (array)json_decode($rooms->amenity);
        $this->room_image = $rooms->image;
        
        // dd($this->rooms);
        // $propertyroom = new PropertyRoom;

        // $this->validate([
        //     'rooms.name'=>'required',
        //     'rooms.description'=>'required',
        // ]);
        // $propertyroom = new PropertyRoom;
        // $propertyroom->name = $this->rooms['name'];
        // $propertyroom->description = $this->rooms['description'];
        // $propertyroom->property_id = $this->property->id;
        // $propertyroom->save();
        // $this->clearAddRoomInput();
        // $this->emit('roomAdded');
        // $this->emit('refreshProperty');
        // $this->property = Property::find($property_id);

    }

    public function deleteRoom($id){
        // dd($id);
        PropertyRoom::find($id)->delete();
        // $this->rooms['name'] = $rooms->name;
        // $this->rooms['description'] = $rooms->description;
        // $this->rooms['id'] = $rooms->id;
        // dd($this->rooms);
        // $propertyroom = new PropertyRoom;

        // $this->validate([
        //     'rooms.name'=>'required',
        //     'rooms.description'=>'required',
        // ]);
        // $propertyroom = new PropertyRoom;
        // $propertyroom->name = $this->rooms['name'];
        // $propertyroom->description = $this->rooms['description'];
        // $propertyroom->property_id = $this->property->id;
        // $propertyroom->save();
        // $this->clearAddRoomInput();
        // $this->emit('roomAdded');
        $this->emit('refreshProperty');
        // $this->property = Property::find($property_id);

    }

    public function updateRoom(){
        // // dd($id);
        // $rooms = PropertyRoom::find($id);
        // $this->rooms['name'] = $rooms->name;
        // $this->rooms['description'] = $rooms->description;
        // $this->rooms['id'] = $rooms->id;
        // dd($this->rooms);
        // $propertyroom = new PropertyRoom;

        $this->validate([
            'rooms.name'=>'required',
            'rooms.description'=>'required',
        ]);
        $propertyroom = PropertyRoom::find($this->rooms['id']);;
        $propertyroom->name = $this->rooms['name'];
        $propertyroom->description = $this->rooms['description'];
        $propertyroom->cost_per_night = $this->rooms['cost_per_night'];
        $propertyroom->cost_per_night_weekly = $this->rooms['cost_per_night_weekly'];
        $propertyroom->cost_per_night_fortnightly = $this->rooms['cost_per_night_fortnightly'];
        $propertyroom->cost_per_night_monthly = $this->rooms['cost_per_night_monthly'];
        $propertyroom->cost_per_night_weekend = $this->rooms['cost_per_night_weekend'];
        $propertyroom->breakfast_included = $this->rooms['breakfast_included'];
        // $propertyroom->breakfast_included = $this->rooms['breakfast_included'];
        if(@$this->rooms['room_image']){
                $imageName = $this->property->name.'-'.$this->property->location->name.'-'.$this->property->state->name.'-'.$this->property->category->name.'-OffBeat-Stays-'.md5(time()).'.'.$this->rooms['room_image']->getClientOriginalExtension();
                $propertyroom->image = '/storage/' .$this->rooms['room_image']->storeAs('uploads/properties/original', $imageName, 'public');
                
        }
        $propertyroom->amenity = @$this->rooms['amenity'];
        
       
        // dd($this->rooms['room_image']);
        

        $propertyroom->save();
        $this->clearAddRoomInput();
        $this->emit('roomUpdated');
        $this->emit('refreshProperty');
        // $this->property = Property::find($property_id);

    }
    public function render()
    {
        return view('livewire.admin.property.admin-property-rooms-component');
    }
}
