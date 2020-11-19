<?php
use App\Models\Product;
$products = Product::where('user_id', Auth::user()->id)->get();
?>

@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="container content">
    <div class="row">
        <div class="col-md-12">
            <h2> <i class="fa fa-home"></i> My Account</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" @if(request()->input('tab') == 'profile') class="active" @endif><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="nav-link">Profile</a></li>
                    <li role="presentation" @if(request()->input('tab') == 'orders') class="active" @endif><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab" class="nav-link">Orders</a></li>
                    <li role="presentation" @if(request()->input('tab') == 'address') class="active" @endif><a href="#address" aria-controls="address" role="tab" data-toggle="tab" class="nav-link">Addresses</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content customer-order-list">
                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'profile')active @endif" id="profile">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>Cash Amount</td>
                                    <td>Products on Stock</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>{{Auth::user()->name}}</td>
                                    <td>{{Auth::user()->cash_amount}}$</td>
                                    <td>{{$products->count()}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'orders')active @endif" id="orders">

                    </div>
                    <div role="tabpanel" class="tab-pane @if(request()->input('tab') == 'adress')active @endif" id="orders">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
