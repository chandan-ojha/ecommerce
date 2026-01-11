<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->order_no }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            font-size: 14px;
            margin: 0;
            padding: 40px;
            background-color: #fff;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .invoice-header img {
            width: 120px;
            margin-bottom: 5px;
        }

        .invoice-header h2 {
            font-weight: 600;
            margin: 0;
            font-size: 20px;
        }

        .invoice-header p {
            margin: 2px 0;
            color: #555;
            font-size: 12px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 0;
            line-height: 1.4;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 6px 8px;
        }

        table th {
            background-color: #f9f9f9;
            text-align: left;
            font-weight: 600;
            font-size: 12px;
        }

        .text-end {
            text-align: right !important;
        }

        .totals {
            max-width: 250px;
            float: right;
            margin-top: 5px;
            border-top: 1.5px solid #ddd;
            padding-top: 5px;
        }

        .totals p {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            margin: 2px 0;
        }

        .totals p.total {
            font-weight: 700;
            font-size: 14px;
        }

        .signature {
            clear: both;
            margin-top: 60px;
            text-align: right;
            font-style: italic;
            font-size: 13px;
        }

        @media print {
            body {
                padding: 0;
            }

            .signature {
                margin-top: 80px;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-header">
        <img src="{{ public_path('assets/backend/img/seba_logo_bg_white.jpg') }}" alt="Logo">
        <h2>Invoice #{{ $order->order_no }}</h2>
        <p>Date: {{ $order->created_at->format('d M Y') }}</p>
    </div>

    <!-- Customer Details -->
    <div class="invoice-details row">
        <div class="col-md-6">
            <p><strong>Customer:</strong> {{ $order->user->name }}</p>
            <p><strong>Phone:</strong> {{ $order->user_address->phone ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $order->user_address->address ?? 'N/A' }}</p>
        </div>
        <div class="col-md-6 text-end">
            <p><strong>Invoice No:</strong> #{{ $order->order_no }}</p>
            <p><strong>Order Status:</strong> {{ ucfirst($order->order_status ?? '') }}</p>
            <p><strong>Payment Status:</strong> {{ ucfirst($order->payment_status ?? '') }}</p>
        </div>
    </div>

    <!-- Product Table -->
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th class="text-end">Price</th>
                <th class="text-end">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->order_items as $item)
                <tr>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="text-end">{{ number_format($item->unit_price, 2) }}</td>
                    <td class="text-end">{{ number_format($item->quantity * $item->unit_price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Totals -->
    <div class="totals">
        <p class="total"><span>Grand Total:</span>
            <span>{{ number_format($order->total_price, 2) }}</span>
        </p>
    </div>

    <!-- Signature -->
    <div class="signature">
        <p>Authorized Signature</p>
        <p>__________________________</p>
    </div>

</body>

</html>
