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
        $this->rooms['cost_per_night'] = 0;
        $this->rooms['cost_per_night_weekly'] = 0;
        $this->rooms['cost_per_night_fortnightly'] = 0;
        $this->rooms['cost_per_night_monthly'] = 0;
        $this->rooms['cost_per_night_weekend'] = 0;
        $this->rooms['breakfast_included'] = false;
        $this->rooms['room_image'] = '';
        $this->rooms['amenity'] = '';
        $this->rooms['description'] = '';
       
    }

    public function addRoom(){
    	// dd($this->rooms);
        $this->validate([
            'rooms.name'=>'required',
            'rooms.description'=>'max:160',
            'rooms.cost_per_night'=>'required|numeric',
            'rooms.cost_per_night_weekly'=>'numeric',
            'rooms.cost_per_night_fortnightly'=>'numeric',
            'rooms.cost_per_night_monthly'=>'numeric',
            'rooms.cost_per_night_weekend'=>'numeric',
        ]);
        $propertyroom = new PropertyRoom;
        $propertyroom->name = $this->rooms['name'];
        $propertyroom->description = @$this->rooms['description'] ?? ' ';
        $propertyroom->number_of_rooms = @$this->rooms['number_of_rooms'] ?? ' ';
        $propertyroom->cost_per_night = @$this->rooms['cost_per_night'];
        $propertyroom->cost_per_night_weekly = @$this->rooms['cost_per_night_weekly'];
        $propertyroom->cost_per_night_fortnightly = @$this->rooms['cost_per_night_fortnightly'];
        $propertyroom->cost_per_night_monthly = @$this->rooms['cost_per_night_monthly'];
        $propertyroom->cost_per_night_weekend = @$this->rooms['cost_per_night_weekend'];
        $propertyroom->breakfast_included = @$this->rooms['breakfast_included'] ?? false;
        $propertyroom->extra_person_cost = @$this->rooms['extra_person_cost'] ?? false;
        // $propertyroom->breakfast_included = $this->rooms['breakfast_included'];
        $propertyroom_images = array();
        if(@$this->rooms['room_image']){
            foreach ($this->rooms['room_image'] as $key => $value) {
                $imageName = $this->property->name.'-'.$this->property->location->name.'-'.$this->property->state->name.'-'.$this->property->category->name.'-OffBeat-Stays-'.md5(time()).$key.'.'.$value->getClientOriginalExtension();
                $propertyroom_images[] = '/storage/' .$value->storeAs('uploads/properties/original', $imageName, 'public');
            }
                
                
        }

        $propertyroom->image = json_encode($propertyroom_images);
        $propertyroom->amenity = json_encode(@$this->rooms['amenity']);
        
       
        
        $propertyroom->property_id = $this->property->id;
        $propertyroom->save();
        // $this->clearAddRoomInput();
        $this->emit('roomAdded');
        $this->clearAddRoomInput();
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
        $this->rooms['number_of_rooms'] = $rooms->number_of_rooms;
        $this->rooms['cost_per_night'] = $rooms->cost_per_night;
        $this->rooms['cost_per_night_weekend'] = $rooms->cost_per_night_weekend;
        $this->rooms['cost_per_night_weekly'] = $rooms->cost_per_night_weekly;
        $this->rooms['cost_per_night_fortnightly'] = $rooms->cost_per_night_fortnightly;
        $this->rooms['cost_per_night_monthly'] = $rooms->cost_per_night_monthly;
        $this->rooms['breakfast_included'] = $rooms->breakfast_included;
        $this->rooms['extra_person_cost'] = $rooms->extra_person_cost;
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
        $propertyroom->extra_person_cost = $this->rooms['extra_person_cost'];
        if(@$this->rooms['room_image']){
                $imageName = $this->property->name.'-'.$this->property->location->name.'-'.$this->property->state->name.'-'.$this->property->category->name.'-OffBeat-Stays-'.md5(time()).'.'.$this->rooms['room_image']->getClientOriginalExtension();
                $propertyroom->image = '/storage/' .$this->rooms['room_image']->storeAs('uploads/properties/original', $imageName, 'public');
                
        }
        $propertyroom->amenity = json_encode(@$this->rooms['amenity']);
        $propertyroom->number_of_rooms = @$this->rooms['number_of_rooms'];

        
       
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
