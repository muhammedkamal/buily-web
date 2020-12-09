@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <h1>Opps!</h1>
        <h3>You don't have enough money on your account </h3>
        <div class="box-footer container">
            <div class="btn-group container">
                <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
                <a href="{{ url('/paypal')}}" class="btn btn-primary">Add More Money</button>
            </div>
        </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection
