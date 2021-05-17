<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Location extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'locations';
    protected $fillable = [
     'name',
     'slug',
     'state_id',
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
}
