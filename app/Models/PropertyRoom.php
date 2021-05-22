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


    public function getAmenitiesAttribute($value)
    {
        $data = (array)json_decode($value);
        return Amenity::whereIn('id', $data)->get();
        
    }
}
