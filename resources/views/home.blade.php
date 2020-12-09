@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!Auth::guest())
                    {{ __('You are logged in!') }}
                    @else
                    <p>You are not logged in! <a href="{{ route('login') }}">login!</a> <hr> <a href="{{ route('products.index') }}"> Go to Proucts</a></p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
