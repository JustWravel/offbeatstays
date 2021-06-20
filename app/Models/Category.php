<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class Category extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    protected $table = 'categories';
    
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
    public function properties($value='')
    {
        return $this->hasMany(Property::class,'category_id');
    }
}
