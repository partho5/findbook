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
    <h3 class="text-center">Pending Orders</h3>
    <div class="col-md-12">
        <div class="col-md-9">
            <div id="order-wrapper">
                @for($i=0; $i<3; $i++)
                    <div class="single-order col-md-12">
                        <!-- row 1 -->
                        <div class="order-info col-md-12">
                            <div class="col-md-2">12 March <br> 2:05 PM</div>
                            <div class="col-md-7" style="border-left: 2px solid rgba(0,0,0,0.42); border-right: 2px solid rgba(0,0,0,0.42);">
                                <p class="product-name"><a href="">Calculus  fjdnf jrn jkn</a></p>
                                <p class="author">Haward Anton</p>
                            </div>
                            <div class="pricing col-md-3">(200 x 1) + <span title="Shipping Cost">30</span>
                                - <span title="Discount">0</span> = 230</div>
                        </div>

                        <!-- row 2 -->
                        <div class="customer-info col-md-12">
                            <div class="left col-md-6">
                                <p>
                                    <label>Name</label>
                                    <span>Partho Protim Mondal</span>
                                </p>

                                <p>
                                    <label>Email</label>
                                    <span>Partho Protim Mondal</span>
                                </p>

                                <p>
                                    <label>Mobile</label>
                                    <span>Partho Protim Mondal</span>
                                </p>
                            </div>
                            <div class="right col-md-6">
                                <button class="save-address btn-default">Save Address</button>
                                <p><textarea id="" class="form-control" rows="2">Jagannath Hall, Room No 410</textarea></p>
                            </div>
                        </div>

                        <!-- row 3 -->
                        <div class="row3 col-md-12">
                            <div class="col-md-8"><textarea id="" class="note form-control" rows="3" placeholder="Short Note"></textarea></div>
                            <div class="col-md-4" style="padding-left: 10px">
                                <p><button class="save-note btn btn-success form-control">Save Note</button></p>
                                <select id="" class="form-control">
                                    <option selected disabled>Order Status</option>
                                    <option value="">Complete</option>
                                    <option value="">Cancel</option>
                                </select>
                            </div>
                        </div>

                    </div>
                @endfor
            </div>
        </div>
        <div class="col-md-3">
            <h3>Completed recently</h3>
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
    });
</script>
</body>
</html>