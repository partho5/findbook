@extends('layout.base_layout')

@section('middle-bar')
    <link rel="stylesheet" href="/assets/css/order.css">
    <div id="middle-bar" class="col-md-8 col-md-push-2 text-left" style="padding: 0px">
        <div class="col-md-12" style="margin-top: 20px; padding: 0px">
            <div class="product-image col-md-4">
                <img src="http://127.0.0.1:8000/assets/images/books/android.png" width="100%" height="280px" alt="">
            </div>
            <div class="col-md-6 col-md-offset-1 book-details">
                <p style="color: #1b6d85">Circuit Analysis Circuit Analysis Circuit Analysis Circuit Analysis</p>
                <p><i><small><b>Author:</b> O'relly </small></i></p>
                <div class="col-md-12" id="quantity-container" style="padding: 0px">
                    <span class="col-md-6 col-xs-6">Quantity</span>
                    <div class="input-group col-md-6 col-xs-6">
                        <input type="number" min="1" class="form-control" value="1">
                    </div>
                </div>

                <div class="col-md-12" id="charged-price-container" style="padding: 0px">
                    <span class="col-md-6 col-xs-6">Price</span>
                    <div class="input-group col-md-6 col-xs-6 text-right">
                        <span>200x3 = 600</span>
                    </div>

                    <span class="col-md-8 col-xs-8">Delivery Charge </span>
                    <div class="input-group col-md-4 col-xs-4 text-right">
                        +<span>30</span>
                    </div>

                    <div class="col-md-12" style="padding: 0px; background-color: rgba(203,203,203,0.69); border-top: 1px solid rgb(94,94,94); color: #f00">
                        <span class="col-md-8 col-xs-8">You will Pay</span>
                        <div class="input-group col-md-4 col-xs-4 text-right">
                            <span>&#2547;</span> <span>630</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 offer-msg hidden">
                <p style="color: #ffbf00">For ordering more than 20 copies, you are getting :</p>
                <p>1 copy book for FREE</p>
                <p>FREE Shipping</p>
                <p>150 TK Discount</p>
            </div>
        </div>
        <form action="" id="place-order-form">
            <div class="col-md-12" style="margin-top: 20px; padding: 0px">
                <h2 class="text-center">Please Fill Up All Fields</h2>
                <div class="form-group">
                    <div class="input-group col-md-12">
                        <label for="" class="col-md-3">My Name</label>
                        <div class="col-md-9 col-xs-12">
                            <input name="name" type="text" class="form-control" placeholder="Full Name" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group col-md-12">
                        <label for="" class="col-md-3">Full Address</label>
                        <div class="col-md-9 col-xs-12">
                            <textarea name="" class="form-control" rows="4" placeholder="Please ensure your full address" required>Hall Name:                                         Room No:</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-12">
                        <label for="" class="col-md-3">Email</label>
                        <div class="col-md-9 col-xs-12">
                            <input name="email" type="text" class="form-control" placeholder="Contact No." required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-12">
                        <label for="" class="col-md-3">Mobile</label>
                        <div class="col-md-9 col-xs-12">
                            <input name="mobile" type="text" class="form-control" placeholder="Contact No." required>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="input-group col-md-12">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" class="btn btn-success" value="Confirm Order">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection