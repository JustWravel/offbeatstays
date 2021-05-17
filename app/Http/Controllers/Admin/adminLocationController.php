<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\State;
use Cviebrock\EloquentSluggable\Services\SlugService;

class adminLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.locationList', [
            'locations' => Location::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.locationCreate', [
            'states' => State::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:locations|max:255',
            'state_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $location = new Location;
        $location->name = $request->name;
        $location->slug = SlugService::createSlug(Location::class, 'slug', $request->name);
        $location->state_id = $request->state_id;
        $location->description = $request->description;
        if($request->file('image')){
            $imageName = $request->name.'-OffBeat-Stays-'.md5(time()).'.'.$request->file('image')->getClientOriginalExtension();
            $location->image = '/storage/' .$request->file('image')->storeAs('uploads/locations/original', $imageName, 'public');
        }
        $location->meta_title = $request->meta_title;
        $location->meta_keywords = $request->meta_keywords;
        $location->meta_description = $request->meta_description;
        $location->save();
        return redirect()->route('admin.location.index')->with('success', 'New Location created.');
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
        return view('admin.pages.locationEdit', [
            'location' => Location::find($id),
            'states' => State::all()
        ]);
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
        $validated = $request->validate([
            'name' => 'required|max:255|unique:locations,name,'.$id,
            'state_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $location = Location::find($id);
        $location->name = $request->name;
        // $location->slug = SlugService::createSlug(Location::class, 'slug', $request->name);
        $location->state_id = $request->state_id;
        $location->description = $request->description;
        if($request->file('image')){
            $imageName = $request->name.'-OffBeat-Stays-'.md5(time()).'.'.$request->file('image')->getClientOriginalExtension();
            $location->image = '/storage/' .$request->file('image')->storeAs('uploads/locations/original', $imageName, 'public');
        }
        $location->meta_title = $request->meta_title;
        $location->meta_keywords = $request->meta_keywords;
        $location->meta_description = $request->meta_description;
        $location->save();
        return redirect()->route('admin.location.index')->with('success', 'New Location created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $locationName = $location->name;
        if(isset($location->image) && $location->image != ''){
            $image_path = public_path().'/'.$location->image;
            unlink($image_path);
        }
        $location->delete();
        return redirect()->route('admin.location.index')->with('success', '"'.$locationName.'" Location deleted successfully.');
    }
}
