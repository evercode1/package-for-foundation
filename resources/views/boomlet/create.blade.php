@extends('layouts.master')

@section('title')

    <title>Create a Boomlet</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/boomlet'>Boomlets</a></li>
        <li class='active'>Create</li>
    </ol>

    <h2>Create a New Boomlets</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/boomlet') }}">

    {{ csrf_field() }}

    <!-- name Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Boomlets Name</label>

            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))

                <span class="help-block">

                <strong>{{ $errors->first('name') }}</strong>

                </span>

            @endif

        </div>

        <div class="form-group{{ $errors->has('boom_id') ? ' has-error' : '' }}">

           <label for="boom_id">Boom Name:</label>

           <select class="form-control" name="boom_id">

           <option value="">Please Choose One</option>

           @foreach($booms as $boom)

               <option value="{{ $boom->id }}">{{ $boom->name }}</option>

               @endforeach

               </select>

           @if ($errors->has('boom_id'))

               <span class="help-block">

               <strong>{{ $errors->first('boom_id') }}</strong>

               </span>

           @endif

        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Create

            </button>

        </div>

    </form>

@endsection