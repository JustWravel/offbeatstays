<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\State;
use App\Models\Category;
use App\Models\Property;
use Cviebrock\EloquentSluggable\Services\SlugService;

class adminPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.propertyList', [
            'properties' => Property::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.propertyCreate', [
            'states' => State::all(),
            'locations' => Location::all(),
            'categories' => Category::all()
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
            'location_id' => 'required',
            'category_id' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $property = new Property;
        $property->name = $request->name;
        $property->slug = SlugService::createSlug(Property::class, 'slug', $request->name);
        $property->state_id = $request->state_id;
        $property->location_id = $request->location_id;
        $property->category_id = $request->category_id;
        $property->description = $request->description;
        if($request->file('image')){
            $imageName = $request->name.'-OffBeat-Stays-'.md5(time()).'.'.$request->file('image')->getClientOriginalExtension();
            $property->image = '/storage/' .$request->file('image')->storeAs('uploads/properties/original', $imageName, 'public');
        }
        $property->meta_title = $request->meta_title;
        $property->meta_keywords = $request->meta_keywords;
        $property->meta_description = $request->meta_description;
        $property->save();
        // dd($property);
        return redirect()->route('admin.property.edit', ['property' => $property->id])->with('success', 'New Property created.');
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
        return view('admin.pages.PropertyEdit', [
            'property' => Property::find($id),
            'states' => State::all(),
            'locations' => Location::all(),
            'categories' => Category::all()
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
        $property = Property::find($id);
        $property->name = $request->name;
        // $property->slug = SlugService::createSlug(Location::class, 'slug', $request->name);
        $property->state_id = $request->state_id;
        $property->description = $request->description;
        if($request->file('image')){
            $imageName = $request->name.'-OffBeat-Stays-'.md5(time()).'.'.$request->file('image')->getClientOriginalExtension();
            $property->image = '/storage/' .$request->file('image')->storeAs('uploads/locations/original', $imageName, 'public');
        }
        $property->meta_title = $request->meta_title;
        $property->meta_keywords = $request->meta_keywords;
        $property->meta_description = $request->meta_description;
        $property->save();
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
        $property = Property::find($id);
        $propertyName = $property->name;
        if(isset($property->image) && $property->image != ''){
            $image_path = public_path().'/'.$property->image;
            unlink($image_path);
        }
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', '"'.$propertyName.'" Property deleted successfully.');
    }
}
