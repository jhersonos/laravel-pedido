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
        $p = array();
        $p =  $request->products;

        $order = new Order;      
        $order->client          = $request->client_id;
        $order->deliveryAmount  = $request->deliveryAmount;
        $order->orderAmount     = $request->orderAmount;
        $order->totalAmount     = $request->totalAmount;
        $order->address         = $request->address;
        $order->references      = $request->references;
        $order->headquarter     = $request->headquarter;
        $order->rider_id        = $request->rider;              
        $order->orderComment    = $request->orderComment;
        $order->district        = $request->district;    

        try {
             if($order->save()) {
                $id = $order->id;
                $this->order_product($id,$p);
            }  
               } catch (Exception $e) {
                    echo $e;      
               }       
        // $order->save();
        
    }

    public function order_product($id,$p){
        $i = 0;
            foreach ($p as $pro) {
                $pquery[] = [
                    'product_id'    => $pro,
                    'order_id'      => $id
                ];
            }
        DB::table('order_product')->insert($pquery);
    }
}
