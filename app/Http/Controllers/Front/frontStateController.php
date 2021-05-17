<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontStateController extends Controller
{
    public function index()
    {
    	return view('front.all-state');
    }

    public function show($slug)
    {
    	return view('front.show-state', ['slug'=>$slug]);
    }
}
