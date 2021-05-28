<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class State extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'states';
    
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

    public function locations()
    {
        return $this->hasMany(Location::class,'state_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class,'state_id');
    }
}
