<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Raleway;
            line-height: 1.25;
        }
        #header{
            background-color: #F2F2F2;
            text-align: center;
            line-height: 0.6;
            padding-top: 1px;
            padding-bottom: 10px;
        }
        #header h3{
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            color: #1b6d85;
        }
        #header .site-name{
            color: #8c8c8c;
        }
        .product-name{
            color: #007b46;
        }
        #pricing{
            background-color: #F2F2F2;
            border: 1px solid rgba(182, 182, 182, 0.51);
        }
        #pricing h4{
            background-color: rgba(0, 74, 91, 0.17);
            color: #000;
        }
        #pricing tr .label{
            text-align: left;
        }
        .total-payable{
            background-color: #1b6d85;
            color: #fff;
        }
        #user-info{
            margin-top: 20px;
            border: 1px solid rgba(182, 182, 182, 0.51);
            background-color: #F2F2F2;
        }

    </style>
</head>

<body>
<div>
    <div id="header">
        <h3>Order Summary</h3>
        <span class="site-name">FindBook.link</span>
    </div>
    <p class="product-name">{{ $order['product']['name'] }}</p>
    <p class="qty">Qty : {{ $order['quantity'] }} piece(s)</p>
    <div id="pricing">
        <h4>Price Calculation</h4>
        <table style="text-align: right">
            <tr>
                <td class="label">Price</td>
                <td>{{ $order['product']['price'] }} x {{ $order['quantity'] }} = {{ $order['product']['price'] * $order['quantity'] }} </td>
            </tr>

            <tr>
                <td class="label">Delivery Charge</td>
                <td>{{ $order['shipping_cost'] }}</td>
            </tr>

            <tr>
                <td class="label">Discount</td>
                <td>{{ $order['discount'] }}</td>
            </tr>

            <tr class="total-payable">
                <td class="label">You will Pay</td>
                <td>{{ $order['product']['price'] * $order['quantity'] + $order['shipping_cost'] - $order['discount'] }}</td>
            </tr>
        </table>
    </div> <!-- #pricing -->

    <div id="user-info">
        <p><u>Will be shipped to </u>: </p>
        <table>
            <tr>
                <td>Name:</td>
                <td>{{ $order['customer_name'] }}</td>
            </tr>

            <tr>
                <td>Email:</td>
                <td>{{ $order['email'] }}</td>
            </tr>

            <tr>
                <td>Mobile:</td>
                <td>{{ $order['phone'] }}</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>{{ $order['full_address'] }}</td>
            </tr>
        </table>
    </div>

</div>
</body>
</html>