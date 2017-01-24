<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    //
    protected $table 	= "headquarter";
    protected $primaryKey="id";

    protected $fillable	=['address','location','restaurant_id'];

    public function products()
    {
    	return $this->hasMany('App/Product');
    }
    public function order()
    {
    	return $this->hasOne('App/Order');
    }
    public function restaurant(){
    	return $this->belongsTo('App/Restaurant');
    }
}

