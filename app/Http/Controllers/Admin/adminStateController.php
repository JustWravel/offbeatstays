<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use Cviebrock\EloquentSluggable\Services\SlugService;

class adminStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.stateList', [
            'states' => State::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.stateCreate');
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
            'name' => 'required|unique:states|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $state = new State;
        $state->name = $request->name;
        $state->slug = SlugService::createSlug(State::class, 'slug', $request->name);
        $state->description = $request->description;
        if($request->file('image')){
            $imageName = $request->name.'-OffBeat-Stays-'.md5(time()).'.'.$request->file('image')->getClientOriginalExtension();
            $state->image = '/storage/' .$request->file('image')->storeAs('uploads/states/original', $imageName, 'public');
        }
        $state->meta_title = $request->meta_title;
        $state->meta_keywords = $request->meta_keywords;
        $state->meta_description = $request->meta_description;
        $state->save();
        return redirect()->route('admin.state.index')->with('success', 'New state created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return State::find($id);
        // return view('admin.pages.stateShow', [
        //     'states' => State::find($id)
        // ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.stateEdit', [
            'state' => State::find($id),
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
            'name' => 'required|max:255|unique:states,name,'.$id,
            // 'image' => 'required',
        ]);
        $state = State::find($id);
        $state->name = $request->name;
        // $state->slug = SlugService::createSlug(State::class, 'slug', $request->name);
        $state->description = $request->description;
        if($request->file('image')){
            $imageName = $request->name.'-OffBeat-Stays-'.md5(time()).'.'.$request->file('image')->getClientOriginalExtension();
            $state->image = '/storage/' .$request->file('image')->storeAs('uploads/states/original', $imageName, 'public');
        }
        $state->meta_title = $request->meta_title;
        $state->meta_keywords = $request->meta_keywords;
        $state->meta_description = $request->meta_description;
        $state->save();
        return redirect()->route('admin.state.index')->with('success', 'State updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);
        $stateName = $state->name;
        if(isset($state->image) && $state->image != ''){
            $image_path = public_path().'/'.$state->image;
            unlink($image_path);
        }
        $state->delete();
        return redirect()->route('admin.state.index')->with('success', '"'.$stateName.'" State deleted successfully.');
    }
}
