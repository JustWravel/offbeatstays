<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\BlogPost;

class FrontAllBlogPostsComponent extends Component
{
    public $blogs;
    public function mount()
    {
        $this->blogs = BlogPost::latest()/*->take(12)*/->get();
    }
    public function render()
    {

        return view('livewire.front.front-all-blog-posts-component')->layout('layouts.front.base');
    }
}
