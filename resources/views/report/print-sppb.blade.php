<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SPPB Document</title>
    <link rel="stylesheet"  href="{{ public_path('css/report.css') }}" type="text/css">

</head>
<body>
    <header id="report-header" style="height: 110px;">
        <div class="wrapper-header">
            <div class="col-sec-1" style="margin-top: 10px">
                <img src="{{ public_path('img/logo/mei.png') }}" style="width: 110px;" alt="">
            </div>
            <div class="col-sec-2">
                <h3 style="text-align: center">PT MITO ENERGI INDONESIA</h3>
                <h5 style="text-align: center">THE BEST PARTNER & SOLUTION</h5>
                <div style="font-size: 13px; text-align: center">Komp. Taman Harapan Indah Blk. C No.16, Kec, Jl. Riau Gg. Harapan 2. Payung Sekaki, Kota Pekanbaru, Riau 28292</div>
                <div style="font-size: 13px; text-align: center">Website: <a href="www.mitoindonesia.com">www.mitoindonesia.com</a>, Email: ptmei.official@gmail.com, Telp: (0761) 5795004, </div>

            </div>
            <div class="col-sec-3" style="margin-top: 20px">
                <img src="{{ public_path('img/logo/iscc.png') }}" style="width: 60px" alt="">
                <img src="{{ public_path('img/logo/iso2015.png') }}" style="width: 60px" alt="">
                <img src="{{ public_path('img/logo/iso2018.png') }}" style="width: 55px" alt="">
            </div>
        </div>
    </header>

    <hr>

    
    <main id="report-content" class="quo-item">
        {{-- Detail Quotation --}}
        <div class="current-date">Pekanbaru, {{ date('d F Y') }}</div>

        {{-- Info no penawaran --}}
        <table id="header-cust-quo">
            <tbody>
                <tr>
                    <th>No PO</th>
                    <td>: {{ $sppb->no_po_cust }}</td>
                </tr>
                <tr>
                    <th>Hal</th>
                    <td>: Surat Permintaan Pengeluaran Barang</td>
                </tr>
            </tbody>
        </table>

        <div class="wrapper-detail-cust">
            <span>Kepada Yth,</span>
            <h5></h5>
            <div class="wrapper-info">
                <p>
                    Dengan hormat, <br>
                    Sehubungan dengan adanya SPPB di {{ $sppb->customer->name }}, melalui surat ini memohon bantuan logistik selaku pengelola gudang untuk memberikan izin keluar barang dagang.
                </p>
                <div>
                    <table class="table-info-no-sp">
                        <tbody>
                            <tr>
                                <td>No SPPB</td>
                                <td>: {{ $sppb->code_sppb }}</td>
                            </tr>
                            <tr>
                                <td>Tgl Dibuat</td>
                                <td>: {{ $sppb->created_at->format('d F Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>Berikut rincian barang tersebut :</p>
            </div>
        </div>

        <table class="table quo-item-table" id="report-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>QTY</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sppb->sppb_item as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->stock_master->code_stock }}</td>
                        <td>{{ $item->stock_master->name_stock }}</td>
                        {{-- <td>{{ $item->qty }}</td> --}}
                        <td>{{ number_format($item->qty, 0, ",", "."); }}</td>
                        <td>{{ $item->stock_master->unit }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top: 20px; line-height: 120%; font-size: 22px;">Demikian surat ini kami sampaikan, agar SPPB dapat diproses, kami ucapkan terima kasih.</p>

    </main>


    <footer id="report-footer">
        <h5>&copy; <?php echo date("Y");?> PT Mito Energi Indonesia</h5> 
        <div class="label-sm ">Dibuat oleh Admin Logistik</div>
    </footer>
</body>
</html>