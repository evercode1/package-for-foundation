<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use Illuminate\Support\Facades\Redirect;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('subcategory.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $categories = Category::orderBy('name', 'asc')->get();

        return view('subcategory.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

       $count = Category::count();

       $this->validate($request, [

            'name' => 'required|unique:subcategories|string|max:30',
            'category_id' => "required|numeric|digits_between:1,$count"

        ]);

        $slug = str_slug($request->name, "-");

        $subcategory = Subcategory::create(['name' => $request->name,
                                                                  'slug' => $slug,
                                                                  'category_id'  => $request->category_id]);
        $subcategory->save();

        return Redirect::route('subcategory.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, $slug='')
    {
        $subcategory = Subcategory::findOrFail($id);

        if ($subcategory->slug !== $slug) {

            return Redirect::route('subcategory.show', ['id' => $subcategory->id,
                                                   'slug' => $subcategory->slug], 301);

        }

        $category = $subcategory->category->name;

        return view('subcategory.show', compact('subcategory', 'category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $categories = Category::orderBy('name', 'asc')->get();

        $oldValue = $subcategory->category->name;

        $oldId = $subcategory->category->id;

        return view('subcategory.edit', compact('subcategory', 'categories', 'oldValue', 'oldId'));
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

        $count = Category::count();

        $this->validate($request, [

            'name' => 'required|string|max:40|unique:subcategories,name,' .$id,
            'category_id' => "required|numeric|digits_between:1,$count"

        ]);

        $subcategory = Subcategory::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $subcategory->update(['name' => $request->name,
                                       'slug' => $slug,
                                       'category_id'  => $request->category_id
                                       ]);


        return Redirect::route('subcategory.show', ['subcategory' => $subcategory,
                                                        'slug' => $slug
                                                        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Subcategory::destroy($id);

        return Redirect::route('subcategory.index');

    }
}