<?php
    use App\Models\User;
?>
@extends('layouts.app')

@section('content')
<h1>Products</h1>
@if(count($products)>0)
<div class="card">
    <ul class="list-group-flush">
        @foreach($products as $post)

        <div class="row" style="margin-top:15px;">
            <div class="col-md-4">
                <img style="width:100%" src="/Buily/public/storage/coverimages/{{$post->cover}}" alt="Post Cover image">
            </div>
            <div class="col-md-8" style="margin-top:5px;">
                <h3><a href="products/{{$post->id}}" class="">{{$post->name}}</a></h3>
                <h5>Price: <span class="text-danger">{{$post->price}}$</span></h5>
                <h5>On Stock: {{$post->quantity}}</h5>
                <small>Added at {{$post->created_at}} | by {{User::find($post->user_id)->name}}</small>
                @if(Auth::user()->id != $post->user_id)
                <hr>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Buy</a>
                @endif
            </div>
        </div>
        @endforeach
    </ul>
</div>
@endif


@endsection
