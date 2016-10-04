<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Queries\GridQueries\GridQuery;

class ApiController extends Controller
{

    // Begin Boom Api Data Grid Method

    public function boomData(Request $request)
    {

        return GridQuery::sendData($request, 'BoomQuery');

    }

    // End Boom Api Data Grid Method



    



    



    



    



    // Begin Widget Api Data Grid Method

    public function widgetData(Request $request)
    {

        return GridQuery::sendData($request, 'WidgetQuery');

    }

    // End Widget Api Data Grid Method

}