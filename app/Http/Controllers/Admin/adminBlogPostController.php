<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Auth;
use Illuminate\Support\Str;
use Image;

class adminBlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'this is index page';
    }

    public function import1()
    {
        $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/posts',
            [
                'order' => 'asc',
                'per_page' => 100,
                'page'=> 1
            ])->json();
        echo "<pre/>";
        // print_r(count($response));
        // print_r($response);
        // die();
        // print_r(count($response));
        
        foreach ($response as $key => $value) {
            // print_r($value);
            $array = [
                'name' => str_replace('&#8211;', '-', $value['title']['rendered']),
                'slug' => $value['slug'],
                
                'image' => $value['jetpack_featured_media_url'],

                'excerpt' => $value['excerpt']['rendered'] ?? '',
                'description' => $value['content']['rendered'],
                
                'created_at' => $value['date'],
                'updated_at' => $value['modified'],
                'user_id' => Auth::user()->id,

                'category_ids' => json_encode($this->addblogcat($value['categories'])),
                'tag_ids' => json_encode($this->addblogtag($value['tags'])),

                // 'state_id' => @$this->getStateId(@$value['listing_states'][0] ?? 9999999),
                // 'location_id' => @$this->getLocationId(@$value['listing_cities'][0] ?? 9999999, @$this->getStateId(@$value['listing_states'][0] ?? 9999999)),
                // 'category_id' => @$this->getCategoryId($value['listing_type'][0] ?? 9999999),
            ];
            
            // print_r($array);
            $this->addblogpost($array);
            
            echo '<br/>';
            echo $key;
            
        }
    }

    public function import()
    {
        // return "xcvxcv";
        $array = BlogPost::get();
        foreach($array as $value){
            if(Str::startswith($value->image, 'https')){
                $blog = BlogPost::find($value->id);
                echo ini_get('allow_url_fopen') ? 'Enabled' : 'Disabled';
                echo $path = $value->image;
                echo '<br/>';
        echo $filename = basename($path).'<br/>';
        echo $file_extension = pathinfo($path, PATHINFO_EXTENSION);

        $imageName = $blog->slug.'-OffBeat-Stays-'.md5(time()).'.'.$file_extension;

        Image::make($path)->save(storage_path('app/public/uploads/blogs/original/'.$imageName));
        $blog->image = '/storage/app/public/uploads/blogs/original/'.$imageName;

        $blog->save();
            }
            // print_r($value->image);

        }


        

        // print_r($array['category_ids']);
        // $output = array();
        // foreach($array as $cat_id){
        //     $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/categories/'.$cat_id,
        //     [
        //         'order' => 'asc',
        //         'per_page' => 10,
        //         'page'=> 1
        //     ])->json();

        //     $blogcategory = BlogCategory::firstOrCreate([
        //         'name' => $response['name'],
        //     ]);
        //     array_push($output, $blogcategory->id);

            
        // }
        // return $output;
    }

    public function addblogcat($array)
    {
        // print_r($array['category_ids']);
        $output = array();
        foreach($array as $cat_id){
            $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/categories/'.$cat_id,
            [
                'order' => 'asc',
                'per_page' => 10,
                'page'=> 1
            ])->json();

            $blogcategory = BlogCategory::firstOrCreate([
                'name' => $response['name'],
            ]);
            array_push($output, $blogcategory->id);

            
        }
        return $output;
    }
    public function addblogtag($array)
    {
        // print_r($array['category_ids']);
        $output = array();
        foreach($array as $cat_id){
            $response = Http::get('https://www.offbeatstays.in/wp-json/wp/v2/tags/'.$cat_id,
            [
                'order' => 'asc',
                'per_page' => 10,
                'page'=> 1
            ])->json();
            // print_r($response);

            $blogtag = BlogTag::firstOrCreate([
                'name' => $response['name'],
            ]);
            array_push($output, $blogtag->id);

            
        }
        return $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
