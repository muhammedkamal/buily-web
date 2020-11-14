@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <form action="{{ route('products.update',$product->id) }}" method="PATCH" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Product</h2>
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover <span class="text-danger">*</span></label>
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity <span class="text-danger">*</span></label>
                            <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="{{ old('quantity') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
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
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
