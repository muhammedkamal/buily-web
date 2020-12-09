<?php
use App\Models\Product;
?>
@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <h1 class="header">Confirm Order !</h1>
        {!! Form::open(['action' => ['App\Http\Controllers\OrderController@update', $order->id ],'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

        <div class="row">
            <div class=" col-md-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Order</a></td>
                            <td>Quantity</td>
                            <td>Total Price</td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td><a href="products/{{$order->product_id}}">{{Product::find($order->product_id)->name}}</a></a></td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}$</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>


            </div>
            <div class="box-footer container">
                <div class="btn-group container">
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Confirm',['class' =>'btn btn-primary'])}}
                    {!! Form::close() !!}
                    {!! Form::open(['action' => ['App\Http\Controllers\OrderController@destroy', $order->id],'method' => 'product', 'class'=>'pull-right']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class' =>'btn btn-default'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
