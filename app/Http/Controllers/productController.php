<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    //
    public function index(Request $request){
    	//get parameter send to url
    	$headquarter_id = $request->query('headquarter');

    	$product = DB::table('products')->select('id','name','size','price','description')->where('headquarter_id',$headquarter_id)->get();

    	return $product;
    }
}
