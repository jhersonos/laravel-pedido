<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";

    protected $fillable = ['client','deliveryAmount','orderAmount','totalAmount','address','references','headquarter','rider_id','orderComment','district'];

    public function headquarter(){
    	return $this->belongsTo('App/Headquarter');
    }
    public function rider(){
    	return $this->hasOne('App/Rider');	
    }
    public function orders(){
    	return $this->belongsToMany('App/Product');
    }
}
