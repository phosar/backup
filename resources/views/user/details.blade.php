@extends('layouts.app')
@section('title')
Quality Health | Details
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Supplement Details
                </div>
                <div class="panel-body">
                    @include('includes.message')
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-4">
                            <div class="card" style="width: 80rem; margin-bottom: 5rem;">
                                <img class="card-img-top" src="/src/images/{{ $supplements->supplement_pic }}"
                                    alt="Card image cap" width="268" height="250">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $supplements->supplement_name }}</h5>
                                    <p class="card-text">R{{ $supplements->supplement_price }}.00</p>
                                    <p>{!! $supplements->supplement_description!!}</p>
                                    <a href="{{route('getAddToCart', ['id' => $supplements->supplement_id])}}" class="btn btn-primary btn-lg">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection