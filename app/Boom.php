<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boom extends Model
{

    protected $fillable = ['name', 'slug'];

    // Begin Boomlet Relationship

    public function boomlets()
    {

       return $this->hasMany('App\Boomlet');

    }

    // End Boomlet Relationship

}