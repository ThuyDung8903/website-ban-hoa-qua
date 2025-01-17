<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1, h2, h3, h4, h5, h6, p, span, label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

<table class="order-details">
    <thead>
    <tr>
        <th width="50%" colspan="2">
            <h2 class="text-start">Shop Thuy Dung</h2>
        </th>
        <th width="50%" colspan="2" class="text-end company-data">
            <span>Invoice Id: {{ $order->order_id }}</span> <br>
            <span>Date: {{ $order->created_at->format('d M Y H:i:s') }}</span> <br>
            <span>Zip code : {{ $order->zip_code }}</span> <br>
            <span>Address: {{ $order->shipping_address }}</span> <br>
        </th>
    </tr>
    <tr class="bg-blue">
        <th width="50%" colspan="2">Order Details</th>
        <th width="50%" colspan="2">Reciever's information</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Order Id:</td>
        <td>{{ $order->id }}</td>

        <td>Full Name:</td>
        <td>{{ $order->shipping_name }}</td>
    </tr>
    <tr>
        <td>Tracking Id/No.:</td>
        <td>{{ $order->tracking_number }}</td>

        <td>Email:</td>
        <td>{{ $order->shipping_email }}</td>
    </tr>
    <tr>
        <td>Ordered Date:</td>
        <td>{{ $order->created_at }}</td>

        <td>Phone:</td>
        <td>{{ $order->shipping_phone }}</td>
    </tr>
    <tr>
        <td>Payment Mode:</td>
        <td>Cash on Delivery</td>

        <td>Address:</td>
        <td>{{ $order->shipping_address }}</td>
    </tr>
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th class="no-border text-start heading" colspan="5">
            Order Items
        </th>
    </tr>
    <tr class="bg-blue">
        <th>ID</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->order_details as $item)
        <tr>
            <td width="10%">{{ $item->id }}</td>
            <td>{{ $item->product_name }}</td>
            <td width="10%">${{ $item->product_price }}</td>
            <td width="10%">{{ $item->quantity }}</td>
            <td width="15%" class="fw-bold">${{ $item->product_price * $item->quantity }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
        <td colspan="1" class="total-heading">${{ $order->total_bill }}</td>
    </tr>
    </tbody>
</table>
<br>
<p class="text-center">Thank your for shopping with Shop Thuy Dung</p>
</body>
</html>