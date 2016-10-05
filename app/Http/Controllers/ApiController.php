<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Queries\GridQueries\GridQuery;

class ApiController extends Controller
{

    // Begin Boomlet Api Data Grid Method

    public function boomletData(Request $request)
    {

        return GridQuery::sendData($request, 'BoomletQuery');

    }

    // End Boomlet Api Data Grid Method



    // Begin Boom Api Data Grid Method

    public function boomData(Request $request)
    {

        return GridQuery::sendData($request, 'BoomQuery');

    }

    // End Boom Api Data Grid Method



    



    



    



    



    



    



    



    // Begin Subcategory Api Data Grid Method

    public function subcategoryData(Request $request)
    {

        return GridQuery::sendData($request, 'SubcategoryQuery');

    }

    // End Subcategory Api Data Grid Method



    // Begin Category Api Data Grid Method

    public function categoryData(Request $request)
    {

        return GridQuery::sendData($request, 'CategoryQuery');

    }

    // End Category Api Data Grid Method




    



    // Begin Widget Api Data Grid Method

    public function widgetData(Request $request)
    {

        return GridQuery::sendData($request, 'WidgetQuery');

    }

    // End Widget Api Data Grid Method

}