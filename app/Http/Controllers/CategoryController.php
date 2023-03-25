<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view ('dashboard/categories.index',[
            "categories" =>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view ('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:15',
            'description'=>'required|min:2',
        ]);
        $categories = new Category();
        $categories->name=$request->input('name');
        $categories->description=$request->input('description');
        $categories->save();
        return view ("dashboard.categories.message",['msg'=>"Publicacion creada con exito"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view ('dashboard.categories.edit', ['categories'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:3|max:15',
            'description'=>'required|min:2',
        ]);
        $categories = Category::find($id);
        $categories->name=$request->input('name');
        $categories->description=$request->input('description');
        $categories->save();
        return view ("dashboard.categories.message",['msg'=>"Publicacion modificada con exito"]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect("dashboard/categories");
    }
}
