<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontPropertyController extends Controller
{
    public function detail($state, $location, $category, $slug)
    {
    	return view('front.property-detail', 
    		[
    			'state'=>$state,
    			'location'=>$location,
    			'category'=>$category,
    			'slug'=>$slug,
    		]);
    }
}
