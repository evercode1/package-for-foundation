@extends('layouts.master')

@section('title')

    <title>Boomlet</title>

@endsection

@section('content')

        <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/boomlet'>Boomlets</a></li>
        <li><a href='/boomlet/{{ $boomlet->id }}'>{{ $boomlet->name }}</a></li>
        </ol>

        <h1>Boomlet Details</h1>

        <hr/>

        <div class="panel panel-default">

                <!-- Table -->
                <table class="table table-striped">
                    <tr>

                        <th>Id</th>
                        <th>Name</th>
                        <th>Boom</th>
                        <th>Date Created</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>


                    <tr>
                        <td>{{ $boomlet->id }} </td>
                        <td> <a href="/boomlet/{{ $boomlet->id }}/edit">
                                {{ $boomlet->name }}</a></td>
                                <td>{{ $boom }}</td>
                        <td>{{ $boomlet->created_at }}</td>

                        <td> <a href="/boomlet/{{ $boomlet->id }}/edit">

                                <button type="button" class="btn btn-default">Edit</button></a></td>

                        <td>

                        <div class="form-group">

                        <form class="form" role="form" method="POST"
                        action="{{ url('/boomlet/'. $boomlet->id) }}">

                        <input type="hidden" name="_method" value="delete">

                        {{ csrf_field() }}

                        <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

                        </form>

                       </div>

                       </td>

                    </tr>

                </table>

        </div>

@endsection

@section('scripts')

    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>

@endsection