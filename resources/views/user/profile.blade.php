@extends('layouts.app')
@section('title')
Quality Health | Profile
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (count($orders) > 0)
            <h2 class="lead">My Orders</h2>
            @foreach ($orders as $order)
            <div class="panel panel-default">
                <div class="panel-heading">Order date: <strong>{{ $order->created_at }}</strong></div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($order->cart->items as $item)

                        <li class="list-group-item">
                            <span class="badge badge-danger"> R{{ $item['price'] }}.00</span>
                            <img src="/src/images/{{ $item['item']['supplement_pic']}}" width="20" height="20"
                                class="img-responsive pull-left"> | {{ $item['item']['supplement_name']}} | {{ $item['qty']}} Units
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <strong>Total Price: R{{ $order->cart->totalPrice }}.00</strong>
                </div>
            </div>
            @endforeach
            @else
            <h2 class="lead">You have no previous orders</h2>
            @endif

        </div>
    </div>
</div>
@endsection