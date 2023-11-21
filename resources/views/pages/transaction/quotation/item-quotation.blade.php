@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('quotation.index') }}">Penawaran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk Penawaran</li>
            </ol>
        </nav>

        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        @foreach ($errors->all() as $message)
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach

        {{-- Form New Quotation --}}
        @if ($quotation->status_quo == 'draf')
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Input Data Produk</h5>
                    <small class="text-muted float-end">Informasi Penawaran Produk</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeItemQuo') }}" method="POST" class="needs-validation form-create">
                        @csrf
                        @method('POST')
                        <div class="row g-2">
                            <div class="col-md-4">
                                <label class="form-label">Kode Produk</label>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#productPricelist" title="Cari produk disini">
                                        <i class='bx bx-search'></i>
                                    </button>

                                    <!-- Modal Find Pricelist -->
                                    <div class="modal fade" id="productPricelist" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl">


                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">List Daftar Produk
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-small mb-4">Tipe Ekspedisi: &nbsp;
                                                        <strong>{{ $quotation->type_expedition }}</strong>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" style="width: 100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Kode Produk</th>
                                                                    <th>Wilayah</th>
                                                                    <th>Cash</th>
                                                                    <th>15H</th>
                                                                    <th>30H</th>
                                                                    <th>Berlaku</th>
                                                                    <th>Exp. Harga</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($pricelists as $pricelist)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $pricelist->stock_master->code_stock }}</td>
                                                                        <td>{{ $pricelist->city->name_city }}</td>
                                                                        <td>{{ 'Rp ' . number_format($pricelist->pay_a, 0, ',', '.') }}
                                                                        </td>
                                                                        <td>{{ 'Rp ' . number_format($pricelist->pay_b, 0, ',', '.') }}
                                                                        </td>
                                                                        <td>{{ 'Rp ' . number_format($pricelist->pay_c, 0, ',', '.') }}
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-info">{{ $pricelist->start_date->format('d-m-Y') }}</span>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-danger">{{ $pricelist->end_date->format('d-m-Y') }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <select class="form-select" id="select-box" name="pricelist_id"
                                        data-placeholder="Pilih Produk" required>
                                        <option></option>
                                        @foreach ($pricelists as $item)
                                            <option value="{{ $item->id }}">{{ $item->stock_master->code_stock }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mb-5">
                                <label class="form-label">Harga Penawaran</label>
                                <input type="text" class="form-control number-input" name="price"
                                    placeholder="Rp 23.000" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="quotation_id" value="{{ $quotation->id }}">
                            <button type="submit" class="btn btn-outline-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        {{-- Form New Quotation --}}

        {{-- Table Quotation Items --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>List Produk Penawaran</h5>
                @if ($quotation->status_quo == 'draf')
                    <div>
                        @if ($quotationItems !== null)
                            <form action="{{ route('submitQuotation', $quotation->id) }}" method="POST"
                                class="form-submit-item-quo">
                                @csrf
                                @method('POST')
                                <button class="btn btn-sm btn-outline-info">Submit Penawaran</button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Nama Barang</th>
                                <th data-priority="2">Kemasan</th>
                                <th data-priority="6">Satuan</th>
                                <th data-priority="6">Tipe Ekspedisi</th>
                                <th data-priority="6">Harga Penawaran</th>
                                <th data-priority="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotationItems as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->pricelist->stock_master->code_stock }}</td>
                                    <td>{{ $data->pricelist->stock_master->packaging }}</td>
                                    <td>{{ $data->pricelist->stock_master->unit }}</td>
                                    <td>{{ $data->quotation->type_expedition }}</td>
                                    <td>{{ 'Rp ' . number_format($data->price, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($quotation->status_quo == 'draf')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End Table -->
    </div>
@endsection

@push('style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#select-box').select2({
            theme: "bootstrap-5",
            allowClear: true
        });
    </script>
@endpush
