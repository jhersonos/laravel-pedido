<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    //
    protected $table	 = "rider";
    protected $primaryKey="id";
    protected $fillable  = ['name','email'];
    public function order(){
    	return $this->belongsTo('App/Order');	
    }

}
