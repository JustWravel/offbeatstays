<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Image;

class adminDashboardController extends Controller
{
    public function show()
    {
    	$response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/listings?listing_cities=154',
    		[
    			'per_page' => 25
    		])->json();
    	echo "<pre/>";

    	print_r($response);
    	// return view('admin.dashboard');
/*
        $filename = 'temp-image.jpg';
$tempImage = tempnam(sys_get_temp_dir(), $filename);
// $source = 
copy('https://www.justwravel.com/assets/img/homepage/featured-trips/JustWravel-Himachal-Backpacking-Trip.jpg', $tempImage);

$imageName = 'Location-OffBeat-Stays-'.md5(time()).'.'.$tempImage->getClientOriginalExtension();
            $location_image = '/storage/' .$request->file('image')->storeAs('uploads/locations/original', $imageName, 'public');

dd($location_image);*/

// $path = 'https://www.justwravel.com/assets/img/homepage/featured-trips/JustWravel-Himachal-Backpacking-Trip.jpg';
// $filename = basename($path);
// $file_extension = pathinfo($path, PATHINFO_EXTENSION);
// $imageName = 'Location-OffBeat-Stays-'.md5(time()).'.'.$file_extension;

// Image::make($path)->save(storage_path('app/public/uploads/locations/original/'.$imageName));

// return response()->download($tempImage, $filename);
    }
}
