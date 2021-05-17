<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use Cviebrock\EloquentSluggable\Services\SlugService;

class adminAmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.amenityList', [
            'amenities' => Amenity::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.amenityCreate');
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
            'name' => 'required|unique:amenities|max:25',
            'iconclass' => 'required',
        ]);
        $amenity = new Amenity;
        $amenity->name = $request->name;
        $amenity->slug = SlugService::createSlug(Amenity::class, 'slug', $request->name);
        
        $amenity->iconclass = $request->iconclass;
        $amenity->save();
        return redirect()->route('admin.amenity.index')->with('success', 'New amenity created.');
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
        return view('admin.pages.amenityEdit', [
            'amenity' => Amenity::find($id),
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
            'name' => 'required|max:255|unique:amenities,name,'.$id,
            'iconclass' => 'required',
            
        ]);
        $amenity = Amenity::find($id);
        $amenity->name = $request->name;
        $amenity->iconclass = $request->iconclass;
        $amenity->save();
        return redirect()->route('admin.amenity.index')->with('success', 'Amenity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenity = Amenity::find($id);
        $amenityName = $amenity->name;
        
        $amenity->delete();
        return redirect()->route('admin.amenity.index')->with('success', '"'.$amenityName.'" Amenity deleted successfully.');
    }
}
