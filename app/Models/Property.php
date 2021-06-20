<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class Property extends Model implements HasMedia
{
     use HasFactory, Sluggable, InteractsWithMedia;

    protected $table = 'properties';
    protected $fillable = [
     'name',
     'slug',
     'description',
    ];


    public function registerMediaConversions(Media $media = null): void
    {
        
        $this->addMediaConversion('banner')
              ->watermark(public_path('front-assets/images/logo.png'))
              ->watermarkHeight(10, Manipulations::UNIT_PERCENT)    // 50 percent height
              ->watermarkWidth(10, Manipulations::UNIT_PERCENT)   // 100 percent width
              ->width(1200)
              
              ->nonQueued();

        $this->addMediaConversion('slider')
              ->watermark(public_path('front-assets/images/logo.png'))
              ->watermarkHeight(10, Manipulations::UNIT_PERCENT)    // 50 percent height
              ->watermarkWidth(10, Manipulations::UNIT_PERCENT)   // 100 percent width
              ->width(750)
              
              ->nonQueued();


        $this->addMediaConversion('thumb')
              ->watermark(public_path('front-assets/images/logo.png'))
              ->watermarkHeight(15, Manipulations::UNIT_PERCENT)    // 50 percent height
              ->watermarkWidth(15, Manipulations::UNIT_PERCENT)   // 100 percent width
              ->width(120)
              ->height(80)
              ->nonQueued();


        $this->addMediaConversion('card')
              ->watermark(public_path('front-assets/images/logo.png'))
              ->watermarkHeight(15, Manipulations::UNIT_PERCENT)    // 50 percent height
              ->watermarkWidth(15, Manipulations::UNIT_PERCENT)   // 100 percent width
              ->width(420)
              ->height(280)
              ->nonQueued();
        
    }
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

        public function image()
    {
        return $this->hasMany(PropertyImage::class,'property_id')->oldest();
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

    public function getTotalroomsAttribute()
    {
        return PropertyRoom::where('property_id', $this->id)->get()->sum('number_of_rooms');
        
    }
}
