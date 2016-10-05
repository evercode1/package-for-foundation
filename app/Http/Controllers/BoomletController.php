<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boomlet;
use App\Boom;
use Illuminate\Support\Facades\Redirect;

class BoomletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('boomlet.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

       $booms = Boom::orderBy('name', 'asc')->get();

        return view('boomlet.create', compact('booms'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

       $count = Boom::count();

       $this->validate($request, [
            'name' => 'required|unique:boomlets|string|max:30',
            'boom_id' => "required|numeric|digits_between:1,$count"

        ]);

        $boomlet = Boomlet::create(['name' => $request->name,
                                                                  'boom_id'  => $request->boom_id]);
        $boomlet->save();

        return Redirect::route('boomlet.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $boomlet = Boomlet::findOrFail($id);

        $boom = $boomlet->boom->name;

        return view('boomlet.show', compact('boomlet', 'boom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $boomlet = Boomlet::findOrFail($id);

        $booms = Boom::orderBy('name', 'asc')->get();

        $oldValue = $boomlet->boom->name;

        $oldId = $boomlet->boom->id;

        return view('boomlet.edit', compact('boomlet', 'booms', 'oldValue', 'oldId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  \$id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $count = Boom::count();

        $this->validate($request, [

            'name' => 'required|string|max:40|unique:boomlets,name,' .$id,
            'boom_id' => "required|numeric|digits_between:1,$count"

        ]);

        $boomlet = Boomlet::findOrFail($id);

        $boomlet->update(['name' => $request->name,
                                       'boom_id'  => $request->boom_id
                                       ]);

        $boom = $boomlet->boom->name;


        return Redirect::route('boomlet.show', ['boomlet' => $boomlet,
                                                        'boom' => $boom
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

        Boomlet::destroy($id);

        return Redirect::route('boomlet.index');

    }
}