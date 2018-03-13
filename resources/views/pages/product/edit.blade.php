<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add-Product</title>
    <meta charset="UTF-8">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/assets/css/product.css">


    <style>

    </style>

</head>
<body>
<div class="col-md-12">
    <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center">Edit Product</h2>
        @if( ! is_null($msg = Session::get('success_msg')) )
            <p class="success-msg">{!! $msg !!}</p>
            {{ Session::put('success_msg', null) }}
        @endif
        <form action="/product/{{ $product->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="" class="col-md-5">Book Name</label>
                <div class="input-group col-md-7">
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" required >
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-5">Author</label>
                <div class="input-group col-md-7">
                    <input type="text" name="author" value="{{ $product->author }}" class="form-control" required >
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-5">Edition</label>
                <div class="input-group col-md-7">
                    <input type="text" name="edition" value="{{ $product->edition }}" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-5">Price</label>
                <div class="input-group col-md-7">
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" required >
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-5">Description</label>
                <div class="input-group col-md-7">
                    <textarea name="description"  class="form-control" rows="3">{{ $product->description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-5">Image</label>
                <div class="input-group col-md-7">
                    <img src="{{ $product->img_url }}" alt="" width="200px" height="200px">
                    <input type="file" name="img_url" class="form-control" >
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-5">Category</label>
                <div class="input-group col-md-7">
                    <input type="text" value="{{ $product->category_id }}" class="form-control" >
                    <input type="hidden" name="category_id" value="0">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group col-md-12">
                    <div class="col-md-2 col-md-offset-5">
                        <input type="submit" class="btn btn-success" value="Save Data">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>