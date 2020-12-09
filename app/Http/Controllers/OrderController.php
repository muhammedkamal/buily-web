<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required',
            'product_id' => 'required',
            'user_id' => 'required'  
        ]);
        $price = $request->input('quantity') * Product::find($request->input('product_id'))->price;
        $order = new Order;
        $order->quantity = $request->input('quantity');
        $order->user_id = $request->input('user_id');
        $order->product_id = $request->input('product_id');
        $order->price = $price;
        $order->save();
        return view('orders.confirm')->with('order',$order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order= Product::find($id);
        return view('orders.create')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $order = Order::find($id);
        $prdouct = Product::find($order->product_id);
        $seller = User::find($prdouct->user_id);
        $buyer =User::find($order->user_id);
            if($buyer->cash_amount<$order->price){
                return view('errors.money');
            }
            else{
                $seller->cash_amount += $order->price;
                $buyer->cash_amount -= $order->price;
                $prdouct->quantity -= $order->quantity;
                $prdouct->update();
                $buyer->update();
                $seller->update();
            }
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('products');
    }
}
