<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | Find Book</title>

    <link rel="stylesheet" href="/assets/css/panel.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<h4 class="text-center">ChoriyeDao + FindBook</h4>
<p class="text-center">Product Add</p>

<table class="table text-center" border="1">
    <tr class="table-head">
         <td>Origin</td> <td>Id</td> <td>cloud_id</td>   <td>name</td>   <td>author</td> 
        <td>product_id</td> <td>img_src</td> <td>product_link</td>   <td>price</td>
        <td>quantity</td> <td>Editable</td> <td>Action</td> <td>Soft Delete</td>
    </tr>

    @foreach($bookData as $book)
        <tr>
            <td><span>ChoriyeDao</span></td>
            <td><input class="id form-control" type="text" id=""  value="{{ $book->id }}"></td>
            <td><input class="form-control" type="text" id=""  value="{{ $book->cloud_id }}"></td>
            <td><input class="book-name form-control" type="text" id=""  value="{{ $book->book_name }}"></td>
            <td><input class="author-name form-control" type="text" id=""  value="{{ $book->author }}"></td>
            <td><input class="form-control" type="text" id=""  value=""></td>
            <td><input class="form-control" type="text" id=""  value=""></td>
            <td><input class="form-control" type="text" id=""  value=""></td>
            <td><input class="price form-control" type="number" id=""  value=""></td>
            <td><input class="form-control" type="number" id=""  value=""></td>
            <td><input class="form-control" type="checkbox"></td>
            <td><span class="btn-1">Save</span></td>
            <td><span class="btn-2">Delete</span></td>
        </tr>
    @endforeach
</table>

</body>
</html>
