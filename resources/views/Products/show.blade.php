@extends('layouts.app')

@section('content')
<h3>{{$product->name}}</h3>
<div class="row">
    <div class="col-md-6">
        <img style="width:100%" src="/Buily/public/storage/coverimages/{{$product->cover}}" alt="product Cover image">
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-8">
                <h3>{{$product->price}}$</h3>
            </div>
            <div class="col-md-4">
                @if(!Auth::guest())
                @if(Auth::user()->id == $product->user_id)
                <h6 class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ __('Edit/delete') }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('products')}}/{{$product->id}}/edit">
                            {{ __('Edit') }}
                        </a>
                        {!! Form::open(['action' => ['App\Http\Controllers\ProductsController@destroy', $product->id ],'method' => 'product', 'class'=>'pull-right']) !!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class' =>'dropdown-item'])}}
                        {!! Form::close() !!}
                    </div>
                </h6>
                @endif
                @else
                <a href="{{ route('orders.edit',$product->id) }}" class="btn btn-primary">Buy</a>
                @endif
            </div>
        </div>
        <div class="row">
            <p>{{$product->description}}</p>
        </div>
    </div>
</div>



@endsection
