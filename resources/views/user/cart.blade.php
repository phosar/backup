@extends('layouts.app')
@section('title')
Quality Health | Cart
@endsection
@section('content')
<div class="container">
    @if (Session::has('cart'))
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Your Cart</div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($supplements as $product)
                        <li class="list-group-item">
                            <span class="badge badge-danger pull-left">{{ $product['qty'] }} </span>
                            &nbsp; 
                            <img src="/src/images/{{ $product['item']['supplement_pic']}}" width="20" height="20"
                                class="img-responsive pull-left">
                            <strong>{{ $product['item']['supplement_name']}}</strong>
                            &nbsp;
                            <span class="badge badge-success pull-right">R{{ $product['price'] }}.00</span>
                            &nbsp;
                            <div class="btn-group">
                                <a href="{{ route('getIncreaseByOne', ['id' => $product['item']['supplement_id']])}}"><i
                                        class="fas fa-plus-circle"></i></a>
                                |
                                <a href="{{ route('getReduceByOne', ['id' => $product['item']['supplement_id']])}}"><i
                                        class="fas fa-minus-circle"></i></a>
                                |
                                <a href="{{ route('getRemoveItem', ['id' => $product['item']['supplement_id']])}}"><i
                                        class="fas fa-remove"></i></a>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- total price section -->
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total: R{{ $totalPrice }}.00</strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <a href="{{ route('getCheckOut')}}" type="button" class="btn btn-success">Checkout</a>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="lead">No items in cart</h2>
        </div>
    </div>
    @endif


</div>
@endsection