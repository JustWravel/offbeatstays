<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Property extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'properties';
    protected $fillable = [
     'name',
     'slug',
     'description',
    ];
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }



    // For State value
    public function state()
    {
    	return $this->belongsTo(State::class,'state_id');
    }
    // For Loction value
    public function location()
    {
    	return $this->belongsTo(Location::class,'location_id');
    }
    // For Loction value
    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id');
    }


    //
    public function images()
    {
        return $this->hasMany(PropertyImage::class,'property_id');
    }

    public function rooms()
    {
        return $this->hasMany(PropertyRoom::class,'property_id');
    }
    

    // public function price()
    // {
    //     // return $this->hasMany(PropertyRoom::class,'property_id');
    //     $rooms = $this->rooms->filter(function ($item) {
    //         return !is_null($item->cost_per_night);
    //     });

    //     return $rooms->min('cost_per_night');
    // }



    public function amenities()
    {
        // // dd(json_decode($this->amenity));
        // $newdata = array();
        // $data = json_decode($this->amenity);
        // foreach ($data as $key => $value) {
        //     // $data[$key] = $value;
        //     $value1 = Amenity::find($value)->first();
        //     // $this->belongsTo(State::class,'state_id');
        //     array_push($newdata, $value1->name);
        // }
        // $this->amenity = $newdata;
        // // dd($this->amenity);
        //  return $this->amenity;

        // return $this->hasMany(Amenity::class,'amenity');
    }



    // public function setAmenityAttribute($value)
    // {
    //     $this->attributes['amenity'] = json_encode($value);
    // }

    public function getAmenitiesAttribute($value)
    {
        $data = (array)json_decode($value);
        return Amenity::whereIn('id', $data)->get();
        
    }

    public function getPriceAttribute()
    {
        // $data = (array)json_decode($value);
        return PropertyRoom::where('property_id', $this->id)->get()->min('cost_per_night');
        
    }
}
