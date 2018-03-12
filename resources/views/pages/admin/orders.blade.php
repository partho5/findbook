<html>
<head>
    <title>All Orders</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/assets/css/admin/orders.css">
</head>

<body>
    <div class="col-md-12">

        {{--Pending--}}

        <div class="col-md-8">
            <h3 class="text-center">Pending</h3>
                <div class="col-md-12 pending-order">
                    <img src="/assets/images/books/android.png" class="col-md-4 col-xs-12"  width="80%" height="200px">
                    <div class="col-md-4">
                        <p>Name : Android Programing</p>
                        <p>Author : Some Author</p>
                        <p>Price : 270 TK</p>
                        <p>Qty : 1 pc (s)</p>
                        <p>Total Price : 270+30=<b>300</b> TK</p>
                    </div>
                    <div class="col-md-4">
                        <p>Ordered AT : 2/3/18</p>
                        <p>Status : Delivered</p>
                        <p>Shipping Add : JN Hall , Room No 410</p>
                        <p>Mobile : 01750366927</p>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <a class="btn btn-danger" href="">Edit Order</a></div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="col-md-10 col-md-offset-1">
                                    <select class="form-control" size="1">
                                        <option selected disabled>Action</option>
                                        <option>Completed</option>
                                        <option>Canceled</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    </div>
        <div class="col-md-4">
            {{--Canceled--}}

            <div class="col-md-12" style="background-color: rgba(255,0,21,0.21)">
                <h3 class="text-center">Canceled</h3>
                <div class="col-md-12 canceled-order">
                    <div class="col-md-12">
                        <img src="/assets/images/books/android.png" class="col-md-6 col-xs-12" alt=""width="100%" height="200px">
                        <div class="col-md-6">
                            <p>Book Name</p>
                            <p>Price</p>
                            <p>Qty</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p>Name</p>
                            </div>
                            <div class="col-md-8">
                                <p>Sourav Kumar Pramanik</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p>Address</p>
                            </div>
                            <div class="col-md-8">
                                <p>Jagannath Hall,Room : 404</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p>Mobile</p>
                            </div>
                            <div class="col-md-8">
                                <p>01750366927</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--complete--}}

            <div class="col-md-12" style="background-color: rgba(0,255,8,0.11)">
                <h3 class="text-center">Completed</h3>
                <div class="col-md-12 completed-order">
                    <div class="col-md-12">
                        <img src="/assets/images/books/android.png" class="col-md-6 col-xs-12" alt=""width="100%" height="200px">
                        <div class="col-md-6">
                            <p>Book Name</p>
                            <p>Price</p>
                            <p>Qty</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p>Name</p>
                            </div>
                            <div class="col-md-8">
                                <p>Sourav Kumar Pramanik</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p>Address</p>
                            </div>
                            <div class="col-md-8">
                                <p>Jagannath Hall,Room : 404</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <p>Mobile</p>
                            </div>
                            <div class="col-md-8">
                                <p>01750366927</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

</body>
</html>