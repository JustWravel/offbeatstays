<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BlogPost extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'blog_posts';
    
    protected $fillable = [
     'name',
     'slug',
     'description',
     'excerpt',
     'image',
     'category_ids',
     'tag_ids',
     'user_id',
     'updated_at',
     'created_at',
    ];
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getAuthorAttribute()
    {
        return User::find($this->user_id);
    }

    public function getCategoriesAttribute()
    {
        $data = (array)json_decode($this->category_ids);
        return BlogCategory::whereIn('id', $data)->get();
    }

    public function getTagsAttribute()
    {
        $data = (array)json_decode($this->tag_ids);
        return BlogTag::whereIn('id', $data)->get();
    }
}
