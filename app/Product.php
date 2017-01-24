<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";

    protected $fillable = ['name','size','price','description','headquarter_id'];

    public function headquarter()
    {
    	return $this->belongsTo('App/Headquarter');
    }
    public function orders(){
    	return $this->belongsToMany('App/Order');
    }
}
