@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box">
        {!! Form::open(['action' => ['App\Http\Controllers\ProductsController@update', $product->id ],'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="box-body">

            <div class="col-md-8">
                <h2>{{$product->name}}</h2>
                <div class="form-group">
                    <label for="name">Name </label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Description </label>
                    <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="cover">Cover </label>
                    <input type="file" name="cover" id="cover" class="form-control">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity </label>
                    <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="{{ $product->quantity }}">
                </div>
                <div class="form-group">
                    <label for="price">Price </label>
                    <div class="input-group">
                        <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{{ $product->price }}">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
