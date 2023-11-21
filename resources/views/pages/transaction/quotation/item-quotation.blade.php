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
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label">Kode Produk</label>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#productPricelist"
                                    title="Cari produk disini">
                                    <i class='bx bx-search'></i>
                                </button>
        
                                <!-- Modal Find Pricelist -->
                                <div class="modal fade" id="productPricelist" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">List Daftar Produk</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-small mb-4">Tipe Ekspedisi: &nbsp; <strong>{{ $quotation->type_expedition }}</strong></div>
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
                                                                    <td>{{ 'Rp ' . number_format($pricelist->pay_a, 0, ',', '.') }}</td>
                                                                    <td>{{ 'Rp ' . number_format($pricelist->pay_b, 0, ',', '.') }}</td>
                                                                    <td>{{ 'Rp ' . number_format($pricelist->pay_c, 0, ',', '.') }}</td>
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
                                <select class="form-select" name="pricelist_id" required>
                                    <option selected>Pilih produk</option>
                                    @foreach ($pricelists as $item)
                                        <option value="{{ $item->id }}">{{ $item->stock_master->code_stock }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Harga Penawaran</label>
                            <input type="text" class="form-control number-input" name="price" placeholder="Rp 23.000" required>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Form New Quotation --}}

        {{-- Table Quotation Items --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>List Produk Penawaran</h5>
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Product</th>
                                <th data-priority="2">Packaging</th>
                                <th data-priority="6">Unit</th>
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
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
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

