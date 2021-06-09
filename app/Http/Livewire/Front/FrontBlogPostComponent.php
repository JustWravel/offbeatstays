<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\BlogPost;

class FrontBlogPostComponent extends Component
{
    public $blog, $next, $previous, $latest;
    public function mount($slug)
    {
        $this->blog = BlogPost::where('slug', $slug)->first();
        $this->next = BlogPost::where('id', '>', $this->blog->id)->orderBy('id')->first();
        $this->previous = BlogPost::where('id', '<', $this->blog->id)->orderBy('id', 'desc')->first();
        $this->latest = BlogPost::where('id', '<>', $this->blog->id)->orderBy('id', 'desc')->take(5)->get();
    }
    public function render()
    {
        return view('livewire.front.front-blog-post-component')->layout('layouts.front.base');
    }
}
