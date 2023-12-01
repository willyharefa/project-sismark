@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">Menu SPPB</h4>

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

        {{-- card Po Internal --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('sppb.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Customer</label>
                        <div class="col-sm-10">

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
                                    <input type="text" class="form-control" name="no_po_cust" placeholder="No PO Customer" autocomplete="off" title="Masukan nomor customer" required>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Buat Data</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- End card --}}

        {{-- Table View --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar SPPB</h5>
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="2">No Sppb</th>
                                <th data-priority="1">PO Customer</th>
                                <th data-priority="3">Customer</th>
                                <th data-priority="5">Status</th>
                                <th data-priority="6">Dibuat oleh</th>
                                <th data-priority="4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sppbs as $sppb)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sppb->code_sppb }}</td>
                                    <td>{{ $sppb->no_po_cust }}</td>
                                    <td>{{ $sppb->customer->name }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $sppb->status_sppb }}</span>
                                    </td>
                                    <td>{{ $sppb->created_by }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>

                                            <div class="dropdown-menu" style="">
                                                <a href="{{ route('sppbDetail', $sppb->id) }}" class="dropdown-item" title="Tambahkan Produk"><i class='bx bx-data'></i> Tambah Item</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('sppbPrint', $sppb->id) }}" target="__blank"><i class="bx bx-printer me-1"></i> Cetak</a>
                                                <a class="dropdown-item" href="{{ route('sppb.edit', $sppb->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href=""><i class="bx bx-trash me-1"></i> Hapus</a>  
                                            </div>
                                        </div>
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
