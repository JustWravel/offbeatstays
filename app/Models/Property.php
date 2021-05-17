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

    public function amenities()
    {
        return $this->hasMany(Amenity::class,'amenity');
    }



    // public function setAmenityAttribute($value)
    // {
    //     $this->attributes['amenity'] = json_encode($value);
    // }

    // public function getAmenityAttribute($value)
    // {
    //     return $this->attributes['amenity'] = json_decode($value);
    // }
}
