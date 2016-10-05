@extends('layouts.master')

@section('title')

    <title>Edit Category</title>

@endsection

@section('content')


    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/category'>Categories</a></li>
        <li><a href='/category/{{$category->id}}'>{{$category->name}}</a></li>
        <li class='active'>Edit</li>
    </ol>

    <h1>Edit Category</h1>

    <hr/>


    <form class="form" role="form" method="POST" action="{{ url('/category/'. $category->id)  }}">
        <input type="hidden" name="_method" value="patch">
    {{ csrf_field() }}

    <!-- widget_name Form Input -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label">Category Name</label>

            <input type="text" class="form-control" name="name" value="{{ $category->name }}">

            @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                Edit
            </button>
        </div>

    </form>


@endsection