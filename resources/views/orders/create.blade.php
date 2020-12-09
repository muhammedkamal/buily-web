@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <form action="{{ route('orders.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Order</td>
                            <td>Quantity</td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <div class="col-md-8">
                                    <a href="#">{{$order->name}}</a>
                                    <img style="width:100%" src="/Buily/public/storage/coverimages/{{$order->cover}}" alt="product Cover image">
                                </div>
                            </td>
                            <td><input type="number" name="quantity" id="quantity" class="form-control" value="1" max="{{$order->quantity}}"></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="product_id" id="product_id" class="form-control" value="<?php echo $order->id?>">
                <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?php echo auth()->user()->id?>">
            </div>
            <!-- /.box-body -->
            <div class="box-footer container">
                <div class="btn-group container">
                    <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
