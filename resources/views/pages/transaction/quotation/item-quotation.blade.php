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
                <div class="card-body">
                    {{-- <form class="row g-3 needs-validation form-create" novalidate
                        action="" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{ $quotation->id }}" name="quotation_id">
                        <div class="col-md-4">
                            <label for="stock_id" class="form-label">Product</label>
                            <select class="form-select select-box" id="stock_master" name="stock_master_id">
                                <option value="" selected>Pilih Produk...</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ old("stock_master_id") == $product->id ? "selected" : "" }}>{{ $product->code_stock }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md">
                            <label for="packaging" class="form-label">Packaging</label>
                            <input type="text" class="form-control" id="packaging" readonly value="" required>
                        </div>

                        <div class="col-md">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" readonly value="" required>
                        </div>
                        <div class="col-md">
                            <label for="unit_price" class="form-label">Unit/Price</label>
                            <input type="text" class="form-control" id="unit" readonly value="" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="submit-input">Tambah Produk</button>
                        </div>
                    </form> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productPricelist">
                        Cari Produk
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="productPricelist" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">List Daftar Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Produk</th>
                                                <th>Wilayah</th>
                                                <th>Harga</th>
                                                <th>Diskon</th>
                                                <th>Tanggal Berlaku</th>
                                                <th>Tanggal Berakhir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pricelists as $pricelist)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pricelist->stock_master->code_stock }}</td>
                                                <td>{{ $pricelist->city->name_city }}</td>
                                                <td>{{ $pricelist->price }}</td>
                                                <td>{{ $pricelist->discount }}</td>
                                                <td>{{ $pricelist->start_date }}</td>
                                                <td>{{ $pricelist->end_date }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary">Pilih</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- Form New Quotation --}}

        {{-- Table Quotation Items --}}
        <div class="card">
            <h5 class="card-header">List Produk Penawaran</h5>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Product</th>
                                <th data-priority="2">Packaging</th>
                                <th data-priority="6">Unit</th>
                                <th data-priority="4">Price</th>
                                <th data-priority="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End Table -->
    </div>
@endsection
