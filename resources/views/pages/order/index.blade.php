@extends('layout.base_layout')

@section('middle-bar')
    <link rel="stylesheet" href="/assets/css/order.css">
    <div id="middle-bar" class="col-md-8 col-md-push-2 text-left" style="padding: 0px">
        <h2 class="text-center">My Orders</h2>
        <div class="col-md-12">
            @foreach($orders as $order)
            <div class="single-order col-md-12" style="padding: 0px">
                <div class="col-md-3">
                    <img src="{{ $order->product_img_url }}" class="col-xs-12" height="200px">
                </div>
                <div class="col-md-9" style="padding: 0px">
                    <div class="col-md-12" style="padding: 0px">
                        <div class="col-md-5" style="padding: 0px">
                            <p>Name : {{ $order->product_name }}</p>
                            <p>Author : {{ $order->author }}</p>
                            <p>Unit Price : {{ $order->price }} TK</p>
                            <p><b>Qty : {{ $order->quantity }} {{ $order->quantity > 1 ? "pcs":"piece" }}</b></p>
                        </div>
                        <div class="col-md-7" style="padding: 0px">
                            <h4>Price Calculation</h4>

                            <div class="col-md-12" id="charged-price-container" style="padding: 0px">
                                <span class="col-md-6 col-xs-6">Price</span>
                                <div class="input-group col-md-6 col-xs-6 text-right" style="padding-right: 5px">
                                    <span>{{ $order->price }}</span> x <span>{{ $order->quantity }} pcs</span> = {{ $order->price * $order->quantity }}
                                    <span></span>
                                </div>

                                <span class="col-md-8 col-xs-8">Delivery Charge </span>
                                <div class="input-group col-md-4 col-xs-4 text-right" style="padding-right: 5px">
                                    <span>{{ $order->delivery_charge > 0 ? "+ ".$order->delivery_charge : "FREE" }}</span>
                                </div>

                                <span class="col-md-8 col-xs-8">Discount </span>
                                <div class="input-group col-md-4 col-xs-4 text-right" style="padding-right: 5px">
                                    -<span>{{ $order->discount }}</span>
                                </div>

                                <div class="col-md-12" style="padding: 0px; background-color: #1b6d85; border-top: 1px solid rgb(94,94,94); color: #fff">
                                    <span class="col-md-8 col-xs-8">You will Pay</span>
                                    <div class="input-group col-md-4 col-xs-4 text-right" style="padding-right: 5px">
                                        <span>&#2547;</span>
                                        <span>
                                            {{ ($order->price * $order->quantity) + $order->delivery_charge - $order->discount }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 hidden">
                        <p>Ordered at : {{ \Carbon\Carbon::parse($order->created_at)->format('F j , g:i A') }}</p>
                        <p>Status : {{ $order->status_code }}</p>
                        <p>Shipped at : {{ $order->full_address }}</p>
                        <p class="hidden">Estimated Delivery Time : Tomorrow Evening</p>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <a href="/order/{{ $order->id }}/edit"><button class="btn-success">Edit Order</button></a>

                        <form action="/order/{{ $order->id }}" method="post" class="col-md-4 col-xs-6">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <a href="/order/{{ $order->id }}">
                                <button class="delete-order-btn btn-danger">Delete</button>
                            </a>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.delete-order-btn').click(function (e) {
                if( ! confirm("Sure Delete This Order ?")){
                    e.preventDefault();
                }
            });
        });
    </script>
    
@endsection
