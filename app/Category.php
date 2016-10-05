<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name'];

    // Begin Subcategory Relationship

    public function subcategories()
    {

       return $this->hasMany('App\Subcategory');

    }

    // End Subcategory Relationship

}