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

        <div class="row">
            <div class="col-md-4">
                <img style="width:100%" src="/Buily/public/storage/coverimages/{{$post->cover}}" alt="Post Cover image">
            </div>
            <div class="col-md-8">
                <h3><a href="products/{{$post->id}}">{{$post->name}}</a></h3>
                <h4>Price: {{$post->price}}</h4>
                <h4>On Stock: {{$post->quantity}}</h4>
                <small>Added at {{$post->created_at}} | by {{User::find($post->user_id)->name}}</small>
            </div>
        </div>
        @endforeach
    </ul>
</div>
@endif


@endsection
