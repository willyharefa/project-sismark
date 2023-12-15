@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">Invoices</a></li>
                <li class="breadcrumb-item active" aria-current="page">Item</li>
            </ol>
        </nav>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert  --}}

        {{-- card detail invoice --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Data Invoice</label>
                    <div class="col-sm-10">

                        <div class="row g-3">
                            <div class="col-md-3">
                                <input class="form-control" type="text" value="{{ $invoice->code_inv }}" disabled readonly>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="text" value="{{ $invoice->no_po_cust }}" disabled readonly title="Nomor PO" placeholder="Nomor PO">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="date" value="{{ $invoice->date_top }}" disabled readonly title="Tanggal TOP/Pembayaran">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Data Customer</label>
                    <div class="col-md-10">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input class="form-control" type="text" value="{{ $invoice->customer->name }}" readonly disabled>
                            </div>
                            <div class="col-md">
                                <input class="form-control" type="text" value="{{ $invoice->customer->address }}" readonly disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Alamat Pengantaran</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $invoice->address_delivery }}" readonly disabled placeholder="Masukan alamat">
                    </div>
                </div>
            </div>
        </div>
        {{-- End detail invoice --}}

        {{-- card sppb list --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5>SPPB List</h5>
                @if ($invoice->status_inv == 'draf')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSPPBList">
                        Tambah SPPB
                    </button>
                    
                    <div class="modal fade" id="modalSPPBList" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar SPPB</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped text-nowrap" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nomor SPPB</th>
                                                    <th>Nomor PO</th>
                                                    <th>Dibuat Oleh</th>
                                                    <th>Tanggal Input</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sppbData as $sppb)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $sppb->code_sppb }}</td>
                                                        <td>{{ $sppb->no_po_cust }}</td>
                                                        <td>{{ $sppb->created_by }}</td>
                                                        <td>{{ $sppb->created_at }}</td>
                                                        <td>
                                                            <form action="{{ route('invoice-to-sppb.store') }}" class="form-create" method="POST">
                                                                @csrf
                                                                @method('POST')
                                                                <input type="hidden" name="sppb_id" value="{{ $sppb->id }}">
                                                                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                                                <button type="submit" class="btn btn-sm btn-primary">Pilih</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor SPPB</th>
                            <th>Tanggal Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoiceToSppbData as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->sppb->code_sppb }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    @if ($invoice->status_inv == 'draf')
                                        <form action="{{ route('invoice-to-sppb.destroy', $data->id) }}" method="POST" class="form-destroy">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End sppb list --}}

        {{-- card invoice item --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5>Invoice Item</h5>
                @if ($invoice->status_inv == 'draf' && $sppbUsed->isNotEmpty())
                    <form action="{{ route('invoice.update', $invoice->id) }}" method="POST" class="form-create">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-primary">Submit Item</button>
                    </form>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>QTY</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sppbUsed as $sppb)  
                            @foreach ($sppb->sppb_item as $data)
                                {{-- @dd($data) --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->stock_master->code_stock }}</td>
                                    <td>{{ $data->stock_master->name_stock }}</td>
                                    <td>{{ number_format($data->qty, 0, ",", "."); }}</td>
                                    <td>{{ 'Rp ' . number_format($data->price, 2, ",", "."); }}</td>
                                    <td>{{ 'Rp ' . number_format($data->total_price, 2, ",", "."); }}</td>
                                    <td>
                                        @if ($invoice->status_inv == 'draf')
                                            <a href="{{ route('editSppbItemPrice', ['sppbItem' => $data->id, 'invoice' => $invoice->id]) }}" class="btn btn-sm btn-info">Update</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End sppb list --}}
    </div>
@endsection

@push('style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-box-2').select2({
                theme: "bootstrap-5",
                allowClear: true
            })

        });
    </script>
@endpush
