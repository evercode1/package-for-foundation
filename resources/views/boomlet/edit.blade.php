@extends('layouts.master')

@section('title')

<title>Edit Boomlet</title>

@endsection

@section('content')


<ol class='breadcrumb'>
    <li><a href='/'>Home</a></li>
    <li><a href='/boomlet'>Boomlets</a></li>
    <li><a href='/boomlet/{{$boomlet->id}}'>{{$boomlet->name}}</a></li>
    <li class='active'>Edit</li>
</ol>

<h1>Edit Boomlet</h1>

<hr/>


<form class="form" role="form" method="POST" action="{{ url('/boomlet/'. $boomlet->id)  }}">

    <input type="hidden" name="_method" value="patch">

    {{ csrf_field() }}

    <!-- Boomlet Form Input -->

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

        <label class="control-label">Boomlet Name</label>

        <input type="text" class="form-control" name="name" value="{{ $boomlet->name }}">

        @if ($errors->has('name'))

        <span class="help-block">

        <strong>{{ $errors->first('name') }}</strong>

        </span>

        @endif

    </div>

    <!-- Boom Form Select -->

    <div class="form-group{{ $errors->has('boom_id') ? ' has-error' : '' }}">

        <label for="boom_id">Boom Name:</label>

        <select class="form-control" name="boom_id">

            <option value="{{ $oldId }}">{{ $oldValue }}</option>

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
            Edit
        </button>
    </div>

</form>


@endsection