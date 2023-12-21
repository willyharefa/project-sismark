<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice Document</title>
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
        <table id="header-cust-quo" class="invoice-detail">
            <tbody>
                <tr>
                    <th style="width: 150px">No. Invoice</th>
                    <td>: </td>
                    <td>{{ $invoice->code_inv }}</td>
                </tr>
                <tr>
                    <th>Tgl Invoice</th>
                    <td>:</td>
                    <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Kepada</th>
                    <td>:</td>
                    <td>{{ $invoice->customer->name }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td >{{ $invoice->address_delivery }}</td>
                </tr>
                <tr>
                    <th>Hal</th>
                    <td>: </td>
                    <td>Invoice Tagihan</td>
                </tr>
            </tbody>
        </table>

        <table class="table quo-item-table" id="report-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>QTY</th>
                    <th>Satuan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $number = 1; ?>
                @foreach ($invoiceToSppbData as $key => $invoiceToSppb)
                    @foreach ($invoiceToSppb->sppb->flatMap->sppb_item as $data)
                        <tr>
                            <td>{{ $number }}</td>
                            <td>{{ $data->stock_master->code_stock }}</td>
                            <td>{{ $data->stock_master->name_stock }}</td>
                            <td>{{ number_format($data->qty, 0, ",", "."); }} {{ $data->stock_master->unit }}</td>
                            <td>{{ 'Rp ' . number_format($data->price, 2, ",", "."); }}</td>
                            <td>{{ 'Rp ' . number_format($data->total_price, 2, ",", "."); }}</td>
                        </tr>
                        <?php $number++; ?>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <table class="sum-invoice">
            <tbody>
                <tr>
                    <th>Sub Total</th>
                    <td>: {{ 'Rp ' . number_format($subTotalTotalPrice, 2, ",", "."); }}</td>
                </tr>
                <tr>
                    <th>Ppn 11%</th>
                    <td>: {{ 'Rp ' . number_format($subTotalTotalPrice*0.11, 2, ",", "."); }}</td>
                </tr>
                <tr>
                    <th>Grand Total</th>
                    <td>: {{ 'Rp ' . number_format($grandTotal, 2, ",", "."); }}</td>
                </tr>
                
            </tbody>
        </table>




        <hr style="margin: 20px 0; color:gray;">

        <div class="wrapper-payment-rek">
            <h5>Rekening tujuan pembayaran :</h5>
            <table id="table-pay-rek" class="">
                <tbody>
                    <tr>
                        <td>Bank</td>
                        <td>: </td>
                        <td>BRI KC Pekanbaru Lancang Kuning</td>
                    </tr>
                    <tr>
                        <td>Atas Nama</td>
                        <td>:</td>
                        <td>PT Mito Energi Indonesia</td>
                    </tr>
                    <tr>
                        <td>No. Rekening</td>
                        <td>:</td>
                        <td>1079-01-000884-30-7</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr style="margin: 20px 0; color:gray;">
        <div class="wrapper-list-note">
            <h5>Catatan :</h5>
            <ol style="margin-left: 1.3rem">
                <li>Invoice ini berlaku sejak tanggal penerbitan</li>
                <li>Pembayaran dapat ditransfer ke nomor rekening yang tertera diatas</li>
                <li>Mohon konfirmasi pembayaran ke email kami di <strong>admin-tax@mitoindonesia.com</strong></li>
                <li>Hubungi kami untuk informasi lebih lanjut jika ada pertanyaan</li>
              </ol> 
        </div>
        <hr style="margin: 20px 0; color:gray;">

        <p style="margin-top: 20px; line-height: 120%; font-size: 22px;">Terimakasih atas kepercayaan {{ $invoice->customer->name }} pada layanan kami.</p>
        <p style="margin-top: 40px; margin-bottom: 100px; margin-left: 62px; font-size: 22px;">Hormat kami,</p>

        <p style="font-size: 22px; margin-left: 76px">Susilawati</p>
        <p style="font-size: 17px;">Head Accounting, Finance & Tax</p>


    </main>


    <footer id="report-footer">
        <h5>&copy; <?php echo date("Y");?> PT Mito Energi Indonesia</h5> 
        <div class="label-sm ">Dibuat oleh Finance</div>
    </footer>
</body>
</html>