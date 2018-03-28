<html>

<head>
    <title>All Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/assets/css/product.css">

</head>
<body>
<div class="col-md-12">

    <nav class="navbar navbar-default navbar-fixed-top" id="menu-bar" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" >Find Book</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/">Store</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <h3 class="text-center">Pending Orders</h3>
    <div class="col-md-12">
        <div class="col-md-9">
            <div id="order-wrapper">
                @foreach($orders as $order)
                    <div class="single-order col-md-12">
                        <!-- row 1 -->
                        <div class="order-info col-md-12">
                            <div class="date-time col-md-2">
                                {{ \Carbon\Carbon::parse($order->created_at)->format('F j') }} <br>
                                {{ \Carbon\Carbon::parse($order->created_at)->format('g:i A') }}
                            </div>
                            <div class="col-md-7" style="border-left: 2px solid rgba(0,0,0,0.42); border-right: 2px solid rgba(0,0,0,0.42);">
                                <p class="product-name"><a href="">{{ $order->product_name }}</a></p>
                                <p class="author">{{ $order->author }}</p>
                            </div>
                            <div class="pricing col-md-3">({{ $order->price }} x {{ $order->quantity }})
                                + <span title="Shipping Cost">{{ $order->delivery_charge }}</span>
                                - <span title="Discount">{{ $order->discount }}</span> = {{ $order->total_payable }}</div>
                        </div>

                        <!-- row 2 -->
                        <div class="customer-info col-md-12">
                            <div class="left col-md-6">
                                <p>
                                    <label>Name</label>
                                    <span>{{ $order->customer_name }}</span>
                                </p>

                                <p>
                                    <label>Email</label>
                                    <span>{{ $order->email }}</span>
                                </p>

                                <p>
                                    <label>Mobile</label>
                                    <span>{{ $order->phone }}</span>
                                </p>
                            </div>
                            <div class="right col-md-6">
                                <button class="save-address btn-default">Save Address</button>
                                <p><textarea id="" class="form-control" rows="2">{{ $order->full_address }}</textarea></p>
                            </div>
                        </div>

                        <!-- row 3 -->
                        <div class="row3 col-md-12">
                            <div class="col-md-8"><textarea id="" class="note form-control" rows="3" placeholder="Short Note"></textarea></div>
                            <div class="col-md-4" style="padding-left: 10px">
                                <p><button class="save-note btn form-control">Save Note</button></p>
                                <select class="order-status form-control" order-id="{{ $order->id }}">
                                    <option selected disabled>Order Status</option>
                                    @foreach($orderStatus as $statusCode => $status)
                                        <option value="{{ $statusCode }}" {{ $order->status_code == $statusCode ? "selected":"" }} >{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <h3>Custom Order</h3>
            @foreach($customOrders as $order)
                <hr>
                <u>{{ \Carbon\Carbon::parse($order->created_at)->format('F j g:i A') }}</u>
                <p>
                    <b>{{ $order-> book_name}}</b>,
                    <i>{{ $order->author_name }}</i>
                </p>
                <p>{{ $order->email }}</p>
                <p>{{ $order->phone }}</p>
                <p>{{ $order->address }}</p>
            @endforeach
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('.product-delete-btn').click(function (e) {
            if( ! confirm("Sure Delete ?")){
                e.preventDefault();
            }
        });

        $('.order-status').on('change', function () {
            var selectedStatus = $(this).val();
            var orderId = $(this).attr('order-id');
            $.ajax({
                url : '/dash/order/save_order_status', type : 'post', data : {
                    _token : "{{ csrf_token() }}", selectedStatus : selectedStatus, orderId : orderId
                }, success : function (response) {
                    console.log(response);
                }, error : function () { alert("Error Occurred. Try again") }
            });
        });
    });
</script>
</body>
</html>