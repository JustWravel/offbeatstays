<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Amenity extends Model
{
    use HasFactory;
    
    use Sluggable;
    public $timestamps = false;

    protected $table = 'amenities';
    
    protected $fillable = [
     'name',
     'slug'
    ];
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
