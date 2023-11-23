<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Products</title>
    <link rel="stylesheet"  href="{{ public_path('css/report.css') }}" type="text/css">

</head>
<body>
    <header id="report-header">
        <h4>PT Mito Energi Indonesia</h4>
        <div class="label-xs address">Komp. Taman Harapan Indah Blk. C No.16, <br> Jl. Riau Gg. Harapan 2, <br> Air Hitam, Kec. Payung Sekaki, <br> Kota Pekanbaru, <br> Riau 28292</div>
    </header>

    
    <main id="report-content">
        <h2 class="title-content">Daftar Produk</h2>
        <table class="table" id="report-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Satuan</th>
                    <th>Kemasan</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $data)
                <tr>
                    <td colspan="6" style="font-weight: bold">{{ $key }}</td>
                </tr>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->code_stock }}</td>
                        <td>{{ $item->name_stock }}</td>
                        <td>{{ $item->unit }}</td>
                        <td>{{ $item->packaging }}</td>
                        <td>{{ $item->stock_category }}</td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </main>

    <footer id="report-footer">
        <h5>&copy; <?php echo date("Y");?> PT Mito Energi Indonesia</h5> 
        <div class="label-sm ">Dibuat oleh Departement IT</div>
    </footer>
</body>
</html>