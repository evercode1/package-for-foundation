<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boomlet extends Model
{

    protected $fillable = ['name', 'boom_id'];

    public function boom()
   {

       return $this->belongsTo('App\Boom');

   }
}