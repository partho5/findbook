@extends('layout.base_layout')

@section('middle-bar')
    <link rel="stylesheet" href="/assets/css/order.css">
    <div id="middle-bar" class="col-md-8 col-md-push-2 text-left">
        <h2 class="text-center">My Orders</h2>
        <div class="col-md-12">
            @for($i=0;$i<3;$i++)
            <div class="single-order row">
                <img src="/assets/images/books/android.png" class="col-md-3 col-xs-12" width="100px" height="200px">
                <div class="col-md-6">
                    <p>Name : Android Programing</p>
                    <p>Author : Some Author</p>
                    <p>Price : 270 TK</p>
                    <p>Qty : 1 pc (s)</p>
                    <p>Total Price : 270+30=<b>300</b> TK</p>
                </div>
                <div class="col-md-3">
                    <p>Ordered AT : 2/3/18</p>
                    <p>Status : Delivered</p>
                    <p>Shipped at : JN Hall , Room No 410</p>
                    <p>Estimated Delivery Time : Tomorrow Evening</p>
                </div>
                <div class="col-md-12 text-center">
                    <br>
                    <a class="btn btn-success" href="">Edit Order</a>
                    <a class="btn btn-danger" href="">Cancel Order</a>
                </div>
            </div>
            @endfor
        </div>
    </div>
@endsection
