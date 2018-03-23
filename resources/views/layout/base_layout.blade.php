<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find Book</title>

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                    <a class="navbar-brand" href="/" style="color: #000">Find Book</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
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
                <div class="col-md-12" style="margin: 10px 0px; padding: 0px">
                    <img src="/assets/images/books/c-sharp.jpeg" alt="">
                </div>
                <div class="col-md-12" style="margin: 10px 0px; padding: 0px">
                    <img src="/assets/images/books/c-sharp.jpeg" alt="">
                </div>
                <div class="col-md-12" style="margin: 10px 0px; padding: 0px">
                    <img src="/assets/images/books/c-sharp.jpeg" alt="">
                </div>
                <div class="col-md-12" style="margin: 10px 0px; padding: 0px">
                    <img src="/assets/images/books/c-sharp.jpeg" alt="">
                </div>
            </div>
            <div id="right-bar" class="col-md-2 col-sm-6">
                <h4 class="text-center">Need a book that isn't here ?</h4>
                <div id="book-request-container" class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span>Book Name</span>
                            <input type="text" id="requested-book-name" class="form-control" placeholder="Specify Edition if needed">
                        </div>
                        <div class="input-group">
                            <span>Writer Name</span>
                            <input type="text" id="requested-book-writer" class="form-control">
                        </div>
                        <div class="input-group">
                            <span>Your Mobile Number</span>
                            <input type="text" id="requester-mobile-num" class="form-control" value="01">
                        </div>
                        <div class="input-group">
                            <span>Address</span>
                            <input type="text" id="requester-address" class="form-control" placeholder="Provide Complete Address">
                        </div>
                        <div class="input-group">
                            <button class="btn btn-success">Order Book</button>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>