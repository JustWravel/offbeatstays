<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PropertyImage extends Model
{
    use HasFactory;
    protected $table = 'property_images';
    
    protected $guarded = [
     // 'name',
     // 'caption',
     // 'property_id',
    ];

    public function getMediaAttribute()
    {
        // $data = (array)json_decode($this->amenity);
        return Media::find($this->name);
        
    }



}
