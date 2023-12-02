@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">Menu Invoice</h4>

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

        @foreach ($errors->all() as $message)
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        {{-- End Alert  --}}

        {{-- card Po Internal --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('invoice.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Customer</label>
                        <div class="col-md-10">

                            <div class="row g-3">

                                <div class="col-md-4">
                                    <select class="form-select select-box-2" name="customer_id" required data-placeholder="Pilih customer">
                                        <option value=""></option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_po_cust" placeholder="Masukan nomor PO" title="Nomor PO" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" name="date_top" title="Tanggal TOP/Pembayaran" required>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Alamat Pengantaran</label>
                        <div class="col-md-10">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <input class="form-control" type="text" readonly value="Yudha Satria" name="sales_user_id" title="PIC Sales & Marketing" required>
                                </div>
                                <div class="col-md">
                                    <input class="form-control" type="text" placeholder="Alamat" title="Masukan alamat pengantaran invoice" name="address_delivery" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Buat Invoice</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- End card --}}

        {{-- Table View --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar Invoice</h5>
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="2">No Invoice</th>
                                <th data-priority="3">Customer</th>
                                <th data-priority="1">PO Customer</th>
                                <th data-priority="5">Status</th>
                                <th data-priority="6">Dibuat oleh</th>
                                <th>Total Invoice</th>
                                <th data-priority="4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $invoice->code_inv }}</td>
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td>{{ $invoice->no_po_cust }}</td>
                                    <td>{{ $invoice->status_inv }}</td>
                                    <td>{{ $invoice->created_by }}</td>
                                    <td>{{ 'Rp  '. number_format($invoice->total_inv, 2, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-sm btn-info">Show</a>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End Table View --}}
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
