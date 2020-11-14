@extends('layouts.app')

@section('content')
    <h3>{{$product->name}}</h3>
    <div class="row">
            <div class="col-md-12">
                <img style="width:100%" src="/Buily/public/storage/coverimages/{{$product->cover}}" alt="product Cover image">
            </div>
    </div>
    <p>{{$product->discription}}</p>
    <hr>
    <small>Written on {{$product->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $product->user_id)
            <a href="{{url('products')}}/{{$product->id}}/edit" class="btn btn-default">Edit</a>
            {!! Form::open(['action' => ['App\Http\Controllers\ProductsController@destroy', $product->id ],'method' => 'product', 'class'=>'pull-right']) !!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' =>'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection
