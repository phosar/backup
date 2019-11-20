<p>Hi {{Auth::user()->user_name}}, your order has been recieved and is being processed. </p>
<p>Below is your order details </p>>
@foreach ($orders as $order)
    <p>Order Number: <strong>{{ $order->order_id}}</strong></p>
    @foreach($order->cart->items as $item)
    <p>
        <span class="badge badge-danger"> R{{ $item['price'] }}.00</span>
        <img src="{{ asset("src/images/" . $item["item"]["supplement_pic"]) }}" width="20" height="20"
            class="img-responsive pull-left"> | {{ $item['item']['supplement_name']}} | {{ $item['qty']}} Units
    </p>
    @endforeach
    <strong>Total Price: R{{ $order->cart->totalPrice }}.00</strong>
@endforeach