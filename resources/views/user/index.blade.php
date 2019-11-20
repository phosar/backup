@extends('layouts.app')
@section('title')
Quality Health | Home
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('includes.message')
            @if (count($supplements) > 0)
                @foreach ($supplements->chunk(3) as $supplementChunk)
                <div class="row" style="margin-bottom: 10px;">
                    @foreach ($supplementChunk as $item)
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem; margin-bottom: 5rem;">
                            <img class="card-img-top" src="/src/images/{{ $item->supplement_pic }}" " alt=" Card image cap"
                                width="268" height="250">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->supplement_name }}</h5>
                                <p class="card-text">R{{ $item->supplement_price }}.00</p>
                                <a href="{{route('getAddToCart', ['id' => $item->supplement_id])}}" class="btn btn-primary btn-sm">Add to Cart</a>
                                <a href="{{route('getProductDetails', ['id' => $item->supplement_id])}}"
                                    class="btn btn-warning btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$supplements->links()}}
                @endforeach
            @else
                <h2 class="lead">Sorry. No supplement in this category.</h2>
            @endif
        </div>
    </div>
</div>
@endsection