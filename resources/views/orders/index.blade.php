<?php
    use App\Models\Order;
    $orders = Order::where('user_id', Auth::user()->id)->get();
?>
<?php
    use App\Models\User;
?>
@extends('layouts.app')

@section('content')
<h1>orders</h1>
@if(count($orders)>0)
<div class="card">
    <table class="table">
        <tbody>
            <tr>
                <td>Time</td>
                <td>Quantity</td>
                <td>Price</td>
                <td></td>
            </tr>
        </tbody>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->created_at}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}$</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif


@endsection
