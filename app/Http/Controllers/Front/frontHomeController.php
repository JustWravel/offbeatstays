<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontHomeController extends Controller
{
    public function index()
    {
    	return view('front.home');
    }
    
}
