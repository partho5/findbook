@extends('layout.base_layout')

@section('middle-bar')
    <link rel="stylesheet" href="/assets/css/order.css">
    <div id="middle-bar" class="col-md-8 col-md-push-2 text-left">
        <h2 class="text-center">My Orders</h2>
        <div class="col-md-12">
            @foreach($orders as $order)
            <div class="single-order row">
                <img src="{{ $order->img_url }}" class="col-md-3 col-xs-12" width="100px" height="200px">
                <div class="col-md-6">
                    <p>Name : {{ $order->product_name }}</p>
                    <p>Author : {{ $order->author }}</p>
                    <p>Unit Price : {{ $order->price }} TK</p>
                    <p>Qty : {{ $order->quantity }} pc (s)</p>
                    <p>Total Price : 270+30=<b>300</b> TK</p>
                </div>
                <div class="col-md-3">
                    <p>Ordered at : {{ \Carbon\Carbon::parse($order->created_at)->format('F j , g:i A') }}</p>
                    <p>Status : {{ $order->status_code }}</p>
                    <p>Shipped at : {{ $order->full_address }}</p>
                    <p class="hidden">Estimated Delivery Time : Tomorrow Evening</p>
                </div>
                <div class="col-md-8 text-right col-xs-12">
                    <a class="col-md-4 col-xs-6" href="/order/{{ $order->id }}/edit">
                        <button class="btn-success">Edit Order</button>
                    </a>
                    <form action="/order/{{ $order->id }}" method="post" class="col-md-4 col-xs-6">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <a href="/order/{{ $order->id }}">
                            <button class="delete-order-btn btn-danger">Delete Order</button>
                        </a>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.delete-order-btn').click(function (e) {
                if( ! confirm("Sure Delete This Order")){
                    e.preventDefault();
                }
            });
        });
    </script>
    
@endsection
