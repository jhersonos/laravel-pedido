<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
    			'client_id'		=>	'',
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
    public function create(Request $request){
        // $order = DB::table('users')->insert();
        $order = new Order;
        $order->products_id     = $request->products;//Input::get('restaurant-list');
        $order->client          = $request->client_id;
        $order->deliveryAmount  = $request->deliveryAmount;
        $order->orderAmount     = $request->orderAmount;
        $order->totalAmount     = $request->totalAmount;
        $order->address         = $request->address;
        $order->references      = $request->references;
        $order->headquarter     = $request->headquarter;
        $order->rider_id        = $request->rider;//Input::get('');
        $order->orderComment    = $request->orderComment;
        $order->district        = $request->district;        // echo $order;
        if($order->save()) {
            $id = $order->id;
            $this->order_product($id);
        }
        // $order->save();
        
    }

    public function order_product($id){

        DB::table('order_product')->insert(
            array('product_id' => 2, 'order_id' => $id)
        );

    }
}
