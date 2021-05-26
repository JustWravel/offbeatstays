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
    

    public function getAmenitiesAttribute()
    {
        $data = (array)json_decode($this->amenity);
        return Amenity::whereIn('id', $data)->get();
        
    }

    public function getFeaturesAttribute()
    {
        $data = (array)json_decode($this->feature);
        return Feature::whereIn('id', $data)->get();
        
    }

    public function getPriceAttribute()
    {
        return PropertyRoom::where('property_id', $this->id)->get()->min('cost_per_night');
        
    }
}
