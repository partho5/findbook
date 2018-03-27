<?php

use App\Products;
use \App\Library\VariableCollection;

$variables = new VariableCollection();

$products = Products::all();
$productImgPrefix = $variables->awsUrlPrefix();


foreach ($products as $product){
    $product->product_img_url = $productImgPrefix."/".$variables->awsBucketName()."/".$product->img_url;
}


?>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find Book</title>

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,600">

</head>
<body>
<div class="body-wrap">
    <div class="container">
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
                        {{--<li><a href="/">Home</a></li>--}}
                        {{--<li><a href="/">Register</a></li>--}}
                        {{--<li><a href="/">Login</a></li>--}}


                        {{--@foreach($rootCategories as $category)--}}
                        {{--<li><a href="">{{ $category }}</a></li>--}}
                        {{--@endforeach--}}
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div> <!-- .container -->
    <div class="container-fluid" id="body-content">
        <h3 class="text-center hidden" style="color: #f00">Under development !!</h3>
        <div class="row">
            @yield('middle-bar')

            <div id="left-bar" class="col-md-2 col-md-pull-8 col-sm-6 text-center" style="padding: 0px">

            </div>

            <div id="right-bar" class="col-md-2 col-sm-6">
                <h4 class="text-center">Need a book that isn't here ?</h4>
                <div id="book-request-container" class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span>Book Name</span>
                            <input type="text" id="requested-book-name" name="book" class="form-control" placeholder="Specify Edition if needed">
                        </div>
                        <div class="input-group">
                            <span>Writer Name</span>
                            <input type="text" id="requested-book-writer" name="writer" class="form-control">
                        </div>
                        <div class="input-group">
                            <span>Your Mobile Number</span>
                            <input type="text" id="requester-mobile-num" name="mobile" class="form-control" value="01">
                        </div>
                        <div class="input-group">
                            <span>Email</span>
                            <input type="email" name="email" id="requester-email" class="form-control">
                        </div>
                        <div class="input-group">
                            <span><b>Full</b> Address</span>
                            <textarea placeholder="Provide Complete Address" id="requester-address" rows="4"></textarea>
                        </div>
                        <div class="input-group">
                            <br>
                            <input type="hidden" id="browser_id" value="">
                            <button class="btn btn-success" id="request-custom-order-btn">Order Book</button>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs/0.5.3/fingerprint.js"></script>
<script>
    $(document).ready(function () {
        $('#browser_id').val(new Fingerprint().get());

        $('#request-custom-order-btn').click(function () {
            $('#browser_id').val(new Fingerprint().get()); // same action to ensure that fingerprint is got
            var book_name = $('#requested-book-name').val();
            var writer_name = $('#requested-book-writer').val();
            var mobile = $('#requester-mobile-num').val();
            var email = $('#requester-email').val();
            var address = $('#requester-address').val();
            var browser_id = $('#browser_id').val();

            if(book_name && writer_name && mobile && email && address){
                $.ajax({
                    url : "request_custom_order", type : "post", data : {
                        _token : "{{ csrf_token() }}", book_name : book_name, author_name : writer_name, phone : mobile,
                        email : email, address : address, browser_id : browser_id
                    }, success : function (response) {
                        //console.log(response);
                        if( response === 'success'){
                            $('#book-request-container input, textarea').each(function () {
                                $(this).val("");
                            });
                            alert("Order received");
                        }
                    }, error : function () { alert("Please try again after reloading page"); }
                });
                //console.log(book_name+"--"+writer_name+"--"+mobile+"--"+email+"--"+address+browser_id);
            }else{
                alert("All fields are mandatory");
            }
        });
    });
</script>

</body>
</html>