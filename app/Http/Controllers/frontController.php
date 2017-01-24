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
    			'products'		=>	'required',
    			'headquarter' 	=> 	'required',
    			'client_id'		=>	'required',
    			'deliveryAmount'=>	'required',
    			'orderAmount'	=>	'required',
    			'totalAmount'	=>	'required',
    			'address'		=>	'required',
    			'references'	=>	'required',
    			'rider'			=>	'required',
    			'orderComment'	=>	'',
    			'district'		=>	'required'
    		]);
    }
    public function create(){
        $order = new orders;

        $order->products = Input::get('username');
        $order->headquarter = Input::get('email');
        $order->client_id = Hash::make(Input::get('password'));
        $order->deliveryAmount = Input::get('email');
        $order->orderAmount = Input::get('email');
        $order->totalAmount = Input::get('email');
        $order->address = Input::get('email');
        $order->references = Input::get('email');
        $order->rider = Input::get('email');
        $order->orderComment = Input::get('email');
        $order->district = Input::get('email');
        $order->save();

        return Redirect::back();
    }
}
