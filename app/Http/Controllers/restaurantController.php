<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class restaurantController extends Controller
{
    //
    public function index(){
    	$restaurant = DB::table('restaurant')->select('id','name')->get();
    	return $restaurant;
    }
}
