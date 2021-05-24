<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Image;
use App\Models\State;
use App\Models\Location;
use App\Models\Category;
use App\Models\Property;
use App\Models\PropertyImage;

class adminDashboardController extends Controller
{
    public function importpropertyonly($page_id)
    {
        $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/listings',
            [
                'order' => 'asc',
                'per_page' => 25,
                'page'=> $page_id
            ])->json();
        echo "<pre/>";
        print_r(count($response));
        
        foreach ($response as $key => $value) {
            $array = [
                'name' => str_replace('&#8211;', '-', $value['title']['rendered']),
                'slug' => $value['slug'],
                'state_id' => @$this->getStateId(@$value['listing_states'][0] ?? 9999999),
                'location_id' => @$this->getLocationId(@$value['listing_cities'][0] ?? 9999999, @$this->getStateId(@$value['listing_states'][0] ?? 9999999)),
                'category_id' => @$this->getCategoryId($value['listing_type'][0] ?? 9999999),
                'description' => $value['content']['rendered'],
            ];
            
            print_r($array);
            $this->addproperty($array);
            
            echo '<br/>';
            echo $key;
            
        }
        
    }

    public function importpropertyimages($page_id)
    {
        $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/listings',
            [
                'order' => 'asc',
                'per_page' => 25,
                'page'=> $page_id
            ])->json();
        echo "<pre/>";
        // print_r(count($response));
        
        foreach ($response as $key => $value) {
            $property = Property::where('slug', $value['slug'])->first();
            echo $property->id;
            // print_r($response['id']);
            $this->getfeaturedattachment($value['_links']['wp:featuredmedia'][0]['href'], $property->id);
            // $this->getotherattachment($value['id'], $property->id);
            // print_r($array);
            // $this->addproperty($array);
            
            echo '<br/>';
            // echo $key;
            
        }
        
    }
    public function show()
    {
    	/*$response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/listings',
    		[
    			'order' => 'asc',
                'per_page' => 100,
                'page'=> 1
    		])->json();
    	echo "<pre/>";
        print_r(count($response));
        
        foreach ($response as $key => $value) {
            $array = [
                'name' => str_replace('&#8211;', '-', $value['title']['rendered']),
                'slug' => $value['slug'],
                'state_id' => @$this->getStateId(@$value['listing_states'][0] ?? 9999999),
                'location_id' => @$this->getLocationId(@$value['listing_cities'][0] ?? 9999999, @$this->getStateId(@$value['listing_states'][0] ?? 9999999)),
                'category_id' => @$this->getCategoryId($value['listing_type'][0] ?? 9999999),
                'description' => $value['content']['rendered'],
            ];
            
            print_r($array);
            $property_id = $this->addproperty($array);
            $this->getfeaturedattachment($value['_links']['wp:featuredmedia'][0]['href'], $property_id);
            // echo $this->getCategoryId($value['listing_cities'][0], $this->getStateId($value['listing_states'][0]));
            // echo $this->getLocationId($value['listing_cities'][0], $this->getStateId($value['listing_states'][0]));
            echo '<br/>';
            echo $key;
            
        }*/

    	// print_r($response);
        // print_r($response);
    	return view('admin.dashboard');
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

    //Get location from offbeat api
    public function addproperty($array)
    {
        // print_r((object)$array);
        $array1 = $array;

        $property = new Property;
        $property->name = $array['name'];
        $property->slug = $array['slug'];
        $property->description = @$array['description'];
        $property->state_id = @$array['state_id'];
        $property->location_id = @$array['location_id'];
        $property->category_id = @$array['category_id'];
        $property->save();
        return $property->id;

    }

    public function getStateId($id)
    {
        $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/listing_states/'.$id,
            [
                'per_page' => 1
            ])->json();

        return State::where('name',$response['name'] ?? 'No Name')->first()->id;
        
       

    }
    public function getLocationId($id, $state_id)
    {
        $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/listing_cities/'.$id,
            [
                'per_page' => 1
            ])->json();

        return Location::firstOrCreate([
            'name'=>$response['name'] ?? 'No Name',
            'state_id'=>$state_id,
        ])->id;
        print_r($response);
        
       

    }

    public function getCategoryId($id)
    {
        $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/listing_type/'.$id,
            [
                'per_page' => 1
            ])->json();

        return Category::firstOrCreate([
            'name'=>$response['name']  ?? 'No Name',
            
        ])->id;
        print_r($response);
        
       

    }


    public function getfeaturedattachment($url, $property_id)
    {
        $response = Http::get($url,
            [
                'per_page' => 100
            ])->json();

        // return Category::firstOrCreate([
        //     'name'=>$response['name'],
            
        // ])->id;
        // foreach ($response as $key => $value) {
        //     echo $value['description']['rendered'];
        // }

        // print_r($response['guid']['rendered']);
        $property = Property::find($property_id);

        echo $path = $response['guid']['rendered'];
        echo '<br/>';
echo $filename = basename($path).'<br/>';
echo $file_extension = pathinfo($path, PATHINFO_EXTENSION);
/*$imageName = $this->property->name.'-'.$this->property->location->name.'-'.$this->property->state->name.'-'.$this->property->category->name.'-OffBeat-Stays-'.md5(time()).'.'.$photo->getClientOriginalExtension();
$PropertyImage = '/storage/' .$photo->storeAs('uploads/properties/original', $imageName, 'public');*/
$imageName = $property->slug.'-OffBeat-Stays-'.md5(time()).'.'.$file_extension;

Image::make($path)->save(storage_path('app/public/uploads/properties/original/'.$imageName));

PropertyImage::create([
                    'name' => '/storage/uploads/properties/original/'.$imageName,
                    'property_id' => $property->id,
                ]);
       

    }

    public function getotherattachment($url, $property_id)
    {
        $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/media',
            [
                'per_page' => 100,
                'parent' => $url,
            ])->json();

        echo "<pre/>";
        print_r($response);

       /* foreach ($response as $key => $value) {
            
            echo '<br>';
            $property = Property::find($property_id);

        echo $path = $value['guid']['rendered'];
        echo '<br/>';
echo $filename = basename($path).'<br/>';
echo $file_extension = pathinfo($path, PATHINFO_EXTENSION);
$imageName = $property->slug.'-OffBeat-Stays-'.md5(time()).$key.'.'.$file_extension;

Image::make($path)->save(storage_path('app/public/uploads/properties/original/'.$imageName));

PropertyImage::create([
                    'name' => '/storage/uploads/properties/original/'.$imageName,
                    'property_id' => $property->id,
                ]);
        }*/


        // return Category::firstOrCreate([
        //     'name'=>$response['name'],
            
        // ])->id;
        // foreach ($response as $key => $value) {
        //     echo $value['description']['rendered'];
        // }

        // print_r($response['guid']['rendered']);
        /*$property = Property::find($property_id);

        echo $path = $response['guid']['rendered'];
        echo '<br/>';
echo $filename = basename($path).'<br/>';
echo $file_extension = pathinfo($path, PATHINFO_EXTENSION);*/
/*$imageName = $this->property->name.'-'.$this->property->location->name.'-'.$this->property->state->name.'-'.$this->property->category->name.'-OffBeat-Stays-'.md5(time()).'.'.$photo->getClientOriginalExtension();
$PropertyImage = '/storage/' .$photo->storeAs('uploads/properties/original', $imageName, 'public');*/
/*$imageName = $property->slug.'-OffBeat-Stays-'.md5(time()).'.'.$file_extension;

Image::make($path)->save(storage_path('app/public/uploads/properties/original/'.$imageName));

PropertyImage::create([
                    'name' => '/storage/uploads/properties/original/'.$imageName,
                    'property_id' => $property->id,
                ]);*/
       

    }
}
