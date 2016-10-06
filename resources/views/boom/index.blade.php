@extends('layouts.master')

@section('title')

    <title>Booms</title>

    @endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Booms</li>
    </ol>

    <h2>Something Special</h2>

    <hr/>

    <boom-grid></boom-grid>

    <div> <a href="boom/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


    @endsection