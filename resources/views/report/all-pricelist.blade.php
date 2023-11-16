<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>All Pricelist</title>
    <link rel="stylesheet"  href="{{ public_path('css/report.css') }}" type="text/css">

</head>
<body>
    <h2>Pricelist Product</h2>

    <table class="table" id="pricelist-table">
        <thead>
            <tr>
                <th>#</th>
                <th>PRODUK</th>
                <th>ORIGIN</th>
                <th>VENDOR</th>
                <th>EKSPEDISI</th>
                <th>HARGA BELI</th>
                <th>PPN 11%</th>
                <th>CASH</th>
                <th>TOP 15H</th>
                <th>TOP 30H</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pricelist as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->stock_master->code_stock }}</td>
                <td>{{ $item->city->name_city }}</td>
                <td>{{ $item->vendor_id }}</td>
                <td>{{ $item->type_expedition }}</td>
                <td>{{ 'Rp ' . number_format($item->purchase_price, 0, ',', '.') }}</td>
                <td>{{ 'Rp ' . number_format($item->tax_price, 0, ',', '.') }}</td>
                <td>{{ 'Rp ' . number_format($item->pay_a, 0, ',', '.') }}</td>
                <td>{{ 'Rp ' . number_format($item->pay_b, 0, ',', '.') }}</td>
                <td>{{ 'Rp ' . number_format($item->pay_c, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>