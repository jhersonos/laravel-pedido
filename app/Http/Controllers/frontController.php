<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class frontController extends Controller
{
    //
    public function index(){
    	return view('index');
    }
    public function order(Request $request){
    	$this -> validate($request,[
    			'products'		=>	'required|unique:posts',
    			'headquarter' 	=> 	'required',
    			'client_id'		=>	'required',
    			'deliveryAmount'=>	'required',
    			'orderAmount'	=>	'required',
    			'totalAmount'	=>	'required',
    			'address'		=>	'required',
    			'references'	=>	'required',
    			'rider'			=>	'required',
    			'orderComment'	=>	'',
    			'discrict'		=>	'required'
    		]);
    }
}
