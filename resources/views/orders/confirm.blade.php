<?php
use App\Models\Product;
$payment = "cridet";
?>
@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <h1 class="header">Confirm Order !</h1>
        {!! Form::open(['action' => ['App\Http\Controllers\OrderController@update', $order->id ],'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

        <div class="row">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Payment Method') }}</div>
                            <div class="card-body">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" @if(request()->input('tab') == 'Cash on Delivry') class="active" {{$payment="cash" }}@endif><a href="#casy" aria-controls="casy" role="tab" data-toggle="tab" class="nav-link">Cash on Delivry</a></li>
                                    <li role="presentation" @if(request()->input('tab') == 'Account Cridet') class="active" {{$payment="cridet" }}@endif><a href="#cridet" aria-controls="cridet" role="tab" data-toggle="tab" class="nav-link">Account Cridet</a></li>
                                    <li role="presentation" @if(request()->input('tab') == 'fawry(not yet)') class="active" {{$payment="fawry" }}@endif><a href="#fawry" aria-controls="fawry" role="tab" data-toggle="tab" class="nav-link">fawry(not yet)</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content customer-order-list">
                                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'casy')active @endif" id="casy">
                                        <p>This adds Extra cash +10$</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'cridet')active @endif" id="cridet">

                                    </div>
                                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'fawry')active @endif" id="fawry">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-md-6">
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
                <div class="row">
                    {{Form::hidden('_method','PUT')}}
                    {{Form::hidden('payment','cridet')}}
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
