<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use Cviebrock\EloquentSluggable\Services\SlugService;

class adminFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.featureList', [
            'features' => Feature::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.featureCreate');
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
            'name' => 'required|unique:features|max:25',
            
        ]);
        $feature = new Feature;
        $feature->name = $request->name;
        $feature->slug = SlugService::createSlug(Feature::class, 'slug', $request->name);
        
        $feature->save();
        return redirect()->route('admin.feature.index')->with('success', 'New feature created.');
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
        return view('admin.pages.featureEdit', [
            'feature' => Feature::find($id),
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
            'name' => 'required|max:255|unique:features,name,'.$id,
           
            
        ]);
        $feature = Feature::find($id);
        $feature->name = $request->name;
        $feature->save();
        return redirect()->route('admin.feature.index')->with('success', 'Feature updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Feature::find($id);
        $amenityName = $feature->name;
        
        $feature->delete();
        return redirect()->route('admin.feature.index')->with('success', '"'.$amenityName.'" Feature deleted successfully.');
    }
}
