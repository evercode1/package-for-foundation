@extends('layouts.master')

@section('title')

    <title>Boomlets</title>

    @endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Boomlets</li>
    </ol>

    <h2>Boomlets</h2>

    <hr/>

    <boomlet-grid></boomlet-grid>

    <div> <a href="boomlet/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


    @endsection