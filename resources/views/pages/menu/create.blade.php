<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find Book</title>

    <link rel="stylesheet" href="/assets/css/admin/menu.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
    <div class="container-fluid"  style="padding: 0px">
        <div class="col-md-12 text-center" style="padding: 0px">
            <div class="col-md-6" style="padding: 0px" id="menu-wrapper">
                <h2>Create New Category</h2>
                @if (Session::has('warning1'))
                    <p class="alert alert-warning">{!! Session::get('warning1') !!}</p>
                @endif
                @if (Session::has('success1'))
                    <p class="alert alert-success">{!! Session::get('success1') !!}</p>
                @endif
                <form method="post" action="/menu">
                    {{ csrf_field() }}
                    <input type="hidden" name="menu_form" value="menu_form">
                    <div class="form-group col-md-12" style="padding: 0px">
                        <div class="col-md-6 text-left">
                            <span style="font-size: 1.4em">Give a category name</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="menu_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12" style="padding: 0px">
                        <div class="col-md-4 col-md-offset-4" style="margin-top: 2em">
                            <input type="submit" class="btn-1" value="Create">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6" style="padding: 0px" id="submenu-wrapper">
                <h2>Create Sub-category</h2>

                @if (Session::has('warning2'))
                    <p class="alert alert-warning">{!! Session::get('warning2') !!}</p>
                @endif
                @if (Session::has('success2'))
                    <p class="alert alert-success">{!! Session::get('success2') !!}</p>
                @endif

                <form method="post" action="/menu">
                    {{ csrf_field() }}
                    <input type="hidden" name="submenu_form" value="submenu_form">
                    <div class="form-group col-md-12" style="padding: 0px">
                        <div class="col-md-6 text-left">
                            <span style="font-size: 1.4em">Sub-category name</span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="submenu_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12" style="padding: 0px">
                        <div class="col-md-6 text-left">
                            <span style="font-size: 1.4em">Select a parent category</span>
                        </div>
                        <div class="col-md-6">
                            <select name="menu_id" class="form-control" required>
                                <option selected disabled>Select One</option>
                                @foreach($menu as $item)
                                <option value="{{ $item->id }}:{{ $item->menu_name }}">{{ $item->menu_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12" style="padding: 0px">
                        <div class="col-md-4 col-md-offset-4" style="margin-top: 2em">
                            <input type="submit" class="btn-1" value="Create Sub">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>