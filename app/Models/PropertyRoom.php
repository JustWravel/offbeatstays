<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyRoom extends Model
{
    use HasFactory;
    protected $table = 'property_rooms';
    protected $fillable = [
     'name',
     'description',
    ];


    public function getAmenitiesAttribute()
    {
        $data = (array)json_decode($this->amenity);
        return Amenity::whereIn('id', $data)->get();
        
    }

    
}
