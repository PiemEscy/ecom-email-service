<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 20px;
        }
        .email-container {
            background: #ffffff;
            width: 100%;
            max-width: 600px;
            margin: auto;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
        .header {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }
        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }
        table th {
            background: #f0f0f0;
        }
        .total {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
            padding-top: 10px;
        }
    </style>
</head>
<body>
<div class="email-container">

    <div class="header">Order Summary</div>

    <div class="section-title">Order Information</div>
    <p><strong>Status:</strong> {{ $status }}</p>
    <p><strong>Order Date:</strong> {{ \Carbon\Carbon::parse($order_date)->format('F j, Y g:i A') }}</p>

    <div class="section-title">Items Ordered</div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        @php $total = 0; @endphp
        @foreach ($items as $item)
            @php
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            @endphp
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['description'] }}</td>
                <td>₱{{ number_format($item['price'], 2) }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>₱{{ number_format($subtotal, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p class="total">Total: ₱{{ number_format($total, 2) }}</p>

</div>
</body>
</html>
