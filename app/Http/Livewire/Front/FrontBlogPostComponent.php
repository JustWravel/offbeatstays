<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\BlogPost;

class FrontBlogPostComponent extends Component
{
    public $blog;
    public function mount($slug)
    {
        $this->blog = BlogPost::where('slug', $slug)->first();
    }
    public function render()
    {
        return view('livewire.front.front-blog-post-component')->layout('layouts.front.base');
    }
}
