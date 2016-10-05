<?php

namespace App\Queries\GridQueries;
use DB;
use App\Queries\GridQueries\Contracts\DataQuery;

class BoomletQuery implements DataQuery
{

    public function data($column, $direction)
    {

        $rows = DB::table('boomlets')
                ->select('boomlets.id as Id',
                         'boomlets.name as Name',
                         'booms.name as Boom',
                         'booms.id as BoomId',
                         DB::raw('DATE_FORMAT(boomlets.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('booms', 'boom_id', '=', 'booms.id')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

    public function filteredData($column, $direction, $keyword)
    {

        $rows = DB::table('boomlets')
                ->select('boomlets.id as Id',
                         'boomlets.name as Name',
                         'booms.name as Boom',
                         'booms.id as BoomId',
                         DB::raw('DATE_FORMAT(boomlets.created_at,
                                 "%m-%d-%Y") as Created'))
                ->leftJoin('booms', 'boom_id', '=', 'booms.id')
                ->where('boomlets.name', 'like', '%' . $keyword . '%')
                ->orWhere('booms.name', 'like', '%' . $keyword . '%')
                ->orderBy($column, $direction)
                ->paginate(10);

            return $rows;

    }

}