<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogTag extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'blog_tags';
    
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
}
