<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\product;
use App\models\order;

class apiController extends Controller
{
    public function products () {
    	$product = product::all();
    	return $product ;
    }

    public function addOrder(Request $request){
    	$price = $request->input('quantity') * Product::find($request->input('product_id'))->price;
        $order = new Order;
        $order->quantity = $request->input('quantity');
        $order->user_id = $request->input('user_id');
        $order->product_id = $request->input('product_id');
        $order->price = $price;
        $order->save();

        return $order ;
    }
}
