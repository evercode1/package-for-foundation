<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Boom;
use Illuminate\Support\Facades\Redirect;

class BoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('boom.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('boom.create');

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

            'name' => 'required|unique:booms|string|max:30',

        ]);

        $slug = str_slug($request->name, "-");

        $boom = Boom::create(['name' => $request->name,
                                                                  'slug' => $slug,]);
        $boom->save();

        return Redirect::route('boom.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, $slug='')
    {
        $boom = Boom::findOrFail($id);

        if ($boom->slug !== $slug) {

            return Redirect::route('boom.show', ['id' => $boom->id,
                                                   'slug' => $boom->slug], 301);
        }

        return view('boom.show', compact('boom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $boom = Boom::findOrFail($id);

        return view('boom.edit', compact('boom'));

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

            'name' => 'required|string|max:40|unique:booms,name,' .$id

        ]);

        $boom = Boom::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $boom->update(['name' => $request->name,
                                       'slug' => $slug,]);

        return Redirect::route('boom.show', ['boom' => $boom, 'slug' => $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Boom::destroy($id);

        return Redirect::route('boom.index');

    }
}