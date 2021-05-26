<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class adminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.categoryList', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categoryCreate');
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
            'name' => 'required|unique:categories|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        $category->description = $request->description;
        if($request->file('image')){
            $imageName = str_replace(' ', '-', $request->name).'-OffBeat-Stays-'.md5(time()).'.'.$request->file('image')->getClientOriginalExtension();
            $category->image = '/storage/' .$request->file('image')->storeAs('uploads/categories/original', $imageName, 'public');
        }
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'New category created.');
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
        return view('admin.pages.categoryEdit', [
            'category' => Category::find($id),
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
            'name' => 'required|max:255|unique:categories,name,'.$id,
            // 'image' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        // $category->slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        $category->description = $request->description;
        if($request->file('image')){
            $imageName = str_replace(' ', '-', $request->name).'-OffBeat-Stays-'.md5(time()).'.'.$request->file('image')->getClientOriginalExtension();
            $category->image = '/storage/' .$request->file('image')->storeAs('uploads/categories/original', $imageName, 'public');
        }
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $categoryName = $category->name;
        if(isset($category->image) && $category->image != ''){
            $image_path = public_path().'/'.$category->image;
            unlink($image_path);
        }
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', '"'.$categoryName.'" Category deleted successfully.');
    }
}
