<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('category.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|unique:categories|string|max:30',

        ]);

        $slug = str_slug($request->name, "-");

        $category = Category::create(['name' => $request->name,
                                                                  'slug' => $slug,]);
        $category->save();

        return Redirect::route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, $slug='')
    {
        $category = Category::findOrFail($id);

        if ($category->slug !== $slug) {

            return Redirect::route('category.show', ['id' => $category->id,
                                                   'slug' => $category->slug], 301);
        }

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required|string|max:40|unique:categories,name,' .$id

        ]);

        $category = Category::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $category->update(['name' => $request->name,
                                       'slug' => $slug,]);

        return Redirect::route('category.show', ['category' => $category, 'slug' => $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Category::destroy($id);

        return Redirect::route('category.index');

    }
}