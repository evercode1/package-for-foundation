<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Widget;
use Illuminate\Support\Facades\Redirect;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('widget.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('widget.create');

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

            'name' => 'required|unique:widgets|string|max:30',

        ]);

        $slug = str_slug($request->name, "-");

        $widget = Widget::create(['name' => $request->name,
                                                                  'slug' => $slug,]);
        $widget->save();

        return Redirect::route('widget.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, $slug='')
    {
        $widget = Widget::findOrFail($id);

        if ($widget->slug !== $slug) {

            return Redirect::route('widget.show', ['id' => $widget->id,
                                                   'slug' => $widget->slug], 301);
        }

        return view('widget.show', compact('widget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $widget = Widget::findOrFail($id);

        return view('widget.edit', compact('widget'));

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

            'name' => 'required|string|max:40|unique:widgets,name,' .$id

        ]);

        $widget = Widget::findOrFail($id);

        $slug = str_slug($request->name, "-");

        $widget->update(['name' => $request->name,
                                       'slug' => $slug,]);

        return Redirect::route('widget.show', ['widget' => $widget, 'slug' => $slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Widget::destroy($id);

        return Redirect::route('widget.index');

    }
}