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
        <h3 class="text-center">All Products</h3>
        <div class="col-md-12">

        {{--1st left--}}
            <div class="col-md-8 all-product-body">
                <div class="col-md-12">

                    @foreach($products as $product)
                        <div class="col-md-6">
                            <div class="col-md-12 all-product-wrapper">
                                <div class="col-md-12">
                                    <img src="{{ $product->img_url }}" class="col-md-4 col-xs-12" alt=""width="100%" height="150px">
                                    <div class="col-md-8">
                                        <p style="font-size: 18px;">{{ $product->name }}</p>
                                        <p>Author: {{ $product->author }} </p>
                                        <p>{{ $product->price }}</p>
                                        <p>{{ $product->category_id }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-6 col-md-offset-3 text-center">
                                        <div class="col-md-12">
                                            <a href="/product/{{ $product->id }}/edit" class="col-md-4" style="all: unset">
                                                <button class="btn-success">Edit</button>
                                            </a>
                                            <form action="/product/{{ $product->id }}" method="post" class="col-md-4">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="delete">
                                                <button class="product-delete-btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
             </div>
            {{--1st Left End--}}

            {{--Main Right--}}
            <div class="col-md-4">
                <h1 class="text-center">some details</h1>
            </div>
            {{--Main Right ENd--}}
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