<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.25;
        }
        .heading{
            text-align: center;
            font-size: 6vh;
            color: #00afad;
        }
       .product-table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            text-align: center;
           background-color: #f8f8f8;
        }
       .product-table th {
           padding-top: 12px;
           padding-bottom: 12px;
           text-align: center;
           background-color: #00afad;
           color: white;
       }
        .product-table td {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
        }
        .address-table {
            width : 100%;
            border-spacing: 0;
            border: 1px solid #ddd;
            text-align: left;
            background-color: #f8f8f8;
        }
        .address-table td {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
        }
       .total-price {
           border-top: 1px solid #00afad ;
           font-size: 5vh;
           color: #f00;
       }
        .address-table{
            background-color: #F2F2F2;
        }

    </style>
</head>

<body>
    <div>
        <h3 class="heading">Overview</h3>
        <p style="text-align: center;">Payment method: <span>Cash On Delivery</span></p>
        <table class="product-table">
            <tr>
                <th>Book Name</th>
                <th>Qty</th>
                <th>Total Price</th>
            </tr>
            <tr>
                <td>A</td>
                <td>5</td>
                <td>300</td>
            </tr>
            <tr>
                <td></td>
                <td>Delivery Charge</td>
                <td>30</td>
            </tr>
            <tr>
                <td></td>
                <td class="total-price">Total</td>
                <td class="total-price">330</td>
            </tr>
        </table>

        <table class="address-table">
            <tr>
                <td></td>
                <td>Name</td>
                <td>Sourav Kumar Pramanik</td>
            </tr>
            <tr>
                <td></td>
                <td>Email</td>
                <td>souravpk.sp@gmail.com</td>
            </tr>
            <tr>
                <td></td>
                <td>Mobile</td>
                <td>01750366927</td>
            </tr>
            <tr>
                <td></td>
                <td>Address</td>
                <td>Jagannath Hall,404</td>
            </tr>
        </table>

    </div>
</body>
</html>