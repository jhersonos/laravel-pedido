<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class headquarterController extends Controller
{

    public function index(Request $request){
    	//get parameter send to url
    	$restaurant_id = $request->query('restaurant');

    	$headquarter=DB::table('headquarter')->select('id','address','location')->where('restaurant_id',$restaurant_id)->get();
    	
    	return $headquarter;
    }
}
