@extends('layout.base_layout')

@section('middle-bar')
    <link rel="stylesheet" href="/assets/css/order.css">
    <div id="middle-bar" class="col-md-8 col-md-push-2 text-left" style="padding: 0px">
        <form action="/order" method="post" id="place-order-form">
        <div class="col-md-12" style="margin-top: 20px; padding: 0px" id="checkout-wrapper">
            <div class="product-image col-md-4">
                <img src="{{ $product->img_url }}" width="100%" height="280px" alt="">
            </div>
            <div class="col-md-6 col-md-offset-1 book-details">
                <p style="color: #1b6d85">{{ $product->name }}</p>
                <p><i><small><b>Author:</b>{{ $product->author }}</small></i></p>
                <div class="col-md-12" id="quantity-container" style="padding: 0px">
                    <span class="col-md-6 col-xs-6">Quantity</span>
                    <div class="input-group col-md-6 col-xs-6">
                        <input type="number" name="quantity" min="1" id="unit" class="form-control" v-model="unit" @change="calculateTotalPrice" @keyup="calculateTotalPrice">
                    </div>
                </div>

                <div class="col-md-12" id="charged-price-container" style="padding: 0px">
                    <span class="col-md-6 col-xs-6">Price</span>
                    <div class="input-group col-md-6 col-xs-6 text-right">
                        <span v-text="unitPrice"></span> x <span v-text="unit"></span> =
                        <span v-text="totalPrice"></span>
                    </div>

                    <span class="col-md-8 col-xs-8">Delivery Charge </span>
                    <div class="input-group col-md-4 col-xs-4 text-right">
                        +<span v-text="shippingCost"></span>
                    </div>

                    <span class="col-md-8 col-xs-8">Discount </span>
                    <div class="input-group col-md-4 col-xs-4 text-right">
                        -<span v-text="discount"></span>
                    </div>

                    <div class="col-md-12" style="padding: 0px; background-color: #1b6d85; border-top: 1px solid rgb(94,94,94); color: #fff">
                        <span class="col-md-8 col-xs-8">You will Pay</span>
                        <div class="input-group col-md-4 col-xs-4 text-right">
                            <span>&#2547;</span> <span v-text="totalPayable"></span>
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

            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="col-md-12" style="margin-top: 20px; padding: 0px">
                <h2 class="text-center">Please Fill Up All Fields</h2>
                <div class="form-group">
                    <div class="input-group col-md-12">
                        <label for="" class="col-md-3">My Name</label>
                        <div class="col-md-9 col-xs-12">
                            <input name="customer_name" type="text" class="form-control" placeholder="Full Name" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group col-md-12">
                        <label for="" class="col-md-3">Full Address</label>
                        <div class="col-md-9 col-xs-12">
                            <textarea name="full_address" class="form-control" rows="4" placeholder="Please ensure your full address" required>Hall Name:                                         Room No:</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-12">
                        <label for="" class="col-md-3">Email</label>
                        <div class="col-md-9 col-xs-12">
                            <input name="email" type="text" class="form-control" placeholder="You will get order information in this email" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group col-md-12">
                        <label for="" class="col-md-3">Mobile</label>
                        <div class="col-md-9 col-xs-12">
                            <input name="phone" type="text" class="form-control" placeholder="Needed to contact you" required>
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

    <script type="text/javascript" src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
    <script>

        var unitPrice = "{{ $product->price }}";
        var shippingCost = 30;
        var discount = 0;
        var unit = 1;

        var app = new Vue({
            el : '#checkout-wrapper',
            data : {
                unitPrice : unitPrice,
                unit : unit,
                shippingCost : shippingCost,
                discount : discount,
                totalPrice : unitPrice * unit,
                totalPayable : unit * unitPrice + parseInt(shippingCost) - discount,
            },
            methods : {
                calculateTotalPrice(){
                    this.totalPrice = this.unit * unitPrice;
                    this.shippingCost = (this.unit >=5) ? 0 : 30;

                    if(this.unit < 5){
                        this.discount = 0;
                    }
                    if(this.unit >=5 && this.unit <= 9){
                        this.discount = 0;
                    }
                    if(this.unit >=10 && this.unit <= 19){
                        this.discount = 100;
                    }
                    if(this.unit >=20 && this.unit <= 49){
                        this.discount = 200;
                    }

                    this.totalPayable = this.unit * this.unitPrice + this.shippingCost - this.discount;
                }
            }
        });

        // https://stackoverflow.com/questions/469357/html-text-input-allows-only-numeric-input
        $(document).ready(function() {
            $("#unit").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl/cmd+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+C
                    (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+X
                    (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection