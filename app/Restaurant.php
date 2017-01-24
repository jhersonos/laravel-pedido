<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected $table 	= "restaurant";

    protected $fillable = ['name'];

    public function headquarters(){
    	return $this->hasMany('App/Headquarter');
    }
}
