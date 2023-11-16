@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">Pricelists</h4>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        {{-- Alert Errors --}}
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        {{-- End Alert --}}

        {{-- Form Pricelist --}}
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Pricelist Baru</h5>
                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#importFile">
                    Import Excel
                </button>

                <!-- Modal -->
                <div class="modal fade" id="importFile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="needs-validation form-create" action="{{ route('importFileExcel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Import Excel File</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Pilih file Excel</label>
                                    <input class="form-control form-control-sm" type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" id="formFile" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pricelist.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row mb-3 g-2">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Nama Produk</label>
                            <select class="form-select select-box @error('stock_master_id') is-invalid @enderror"
                                name="stock_master_id" required>
                                <option value="" selected>Pilih Produk</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('stock_master_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->code_stock }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Wilayah</label>
                            <select class="form-select select-box @error('city_id') is-invalid @enderror" name="city_id"
                                required>
                                <option value="" selected>Pilih Wilayah</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name_city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Vendor</label>
                            <input type="text" class="form-control" placeholder="Nama vendor" name="vendor_id" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Ekspedisi</label>
                            <select class="form-select select-box @error('type_expedition') is-invalid @enderror"
                                name="type_expedition" required>
                                <option value="" selected>Tipe Ekpedisi</option>
                                <option value="Franco" {{ old('type_expedition') == 'Franco' }}>Franco</option>
                                <option value="Loco" {{ old('type_expedition') == 'Loco' }}>Loco</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Harga (Cash)</label>
                            <div class="input-group col-md-3 mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control number-input" placeholder="Rp 24.038"
                                    name="pay_a" value="{{ old('pay_a') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Harga (15H)</label>
                            <div class="input-group col-md-3 mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control number-input" placeholder="Rp 23.000"
                                    name="pay_b" value="{{ old('pay_b') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Harga (30H)</label>
                            <div class="input-group col-md-3 mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control number-input" placeholder="Rp 36.408"
                                    name="pay_c" value="{{ old('pay_c') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Tanggal Berlaku</label>
                            <input type="date" class="form-control" name="start_date"
                                value="{{ old('start_date') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Exp. Date</label>
                            <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}"
                                required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
        {{-- End Form --}}


        {{-- Table --}}
        <div class="card mb-3">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Daftar Pricelist</h5>
                <div class="btn-group" id="dropdown-icon-demo">
                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-printer bx-xs"></i> Cetak Pricelist
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('allPricelist') }}" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-chevron-right"></i>Semua Pricelist
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-chevron-right"></i>Berdasarkan Loco
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-chevron-right"></i>Berdasarkan Franco
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"><i
                                    class="bx bx-chevron-right scaleX-n1-rtl"></i>Export File</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered text-nowrap" id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Wilayah</th>
                            <th>Vendor</th>
                            <th>Ekspedisi</th>
                            <th>Cash</th>
                            <th>15H</th>
                            <th>30H</th>
                            <th>Tanggal Berlaku</th>
                            <th>Berakhir</th>
                            <th data-priority="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pricelists as $pricelist)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pricelist->stock_master->code_stock }}</td>
                                <td>{{ $pricelist->city->name_city }}</td>
                                <td>{{ $pricelist->vendor_id }}</td>
                                <td>{{ $pricelist->type_expedition }}</td>
                                <td>{{ 'Rp ' . number_format($pricelist->pay_a, 0, ',', '.') }}</td>
                                <td>{{ 'Rp ' . number_format($pricelist->pay_b, 0, ',', '.') }}</td>
                                <td>{{ 'Rp ' . number_format($pricelist->pay_c, 0, ',', '.') }}</td>
                                <td>{{ $pricelist->start_date->format('d-m-Y') }}</td>
                                <td>{{ $pricelist->end_date->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('pricelist.edit', $pricelist->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('pricelist.destroy', $pricelist->id) }}" method="POST"
                                        class="needs-validation form-destroy d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End Table --}}

    </div>
@endsection
