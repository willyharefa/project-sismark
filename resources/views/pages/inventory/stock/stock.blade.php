@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inventory /</span> Stock Master</h4>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        {{-- Alert Danger --}}
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Danger --}}

        {{-- Alert Errors --}}
        @foreach ($errors->all() as $message)
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        {{-- Alert Error --}}

        {{-- Form Stock --}}
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Produk Baru</h5>
                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#importFile">
                    Import Excel
                </button>

                <!-- Modal -->
                <div class="modal fade" id="importFile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="needs-validation form-create" action="{{ route('importStock') }}" method="POST" enctype="multipart/form-data">
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
                <form action="{{ route('stock-master.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label for="code_stock" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control @error('code_stock') is-invalid @enderror" id="code_stock" name="code_stock" placeholder="MEICHEM SC 02" value="{{ old('code_stock') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="name_stock" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('name_stock') is-invalid @enderror" id="name_stock" name="name_stock" placeholder="Alkalinity Booster" value="{{ old('name_stock') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="unit" class="form-label">Satuan</label>
                            <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" placeholder="Pcs" value="{{ old('unit') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="packaging" class="form-label">Kemasan</label>
                            <input type="text" class="form-control @error('packaging') is-invalid @enderror" id="packaging" name="packaging" placeholder="25Kg/zak" value="{{ old('packaging') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="stock_category" class="form-label">Kemasan</label>
                            <select class="form-select select-box @error('stock_category') is-invalid @enderror" name="stock_category" required>
                                <option value="" selected>Pilih Kategori</option>
                                <option value="General Chemical" {{ old('stock_category') == "General Chemical" ? "selected" : ""  }}>General Chemical</option>
                                <option value="Specialty Chemical" {{ old('stock_category') == "Specialty Chemical" ? "selected" : ""  }}>Specialty Chemical</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="branch_id" class="form-label">Bin</label>
                            <select class="form-select select-box @error('branch_id') is-invalid @enderror" id="branch_id" name="branch_id" required>
                                <option selected value="">Pilih Bin</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? "selected" : "" }}>{{ $branch->code_branch }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Buat Produk</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Form Stock --}}


        {{-- Table Stock --}}
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Daftar Produk</h5>
                <div class="btn-group" id="dropdown-icon-demo">
                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-printer bx-xs"></i> Cetak Data
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('allProducts') }}" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-chevron-right"></i>Semua Produk
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-chevron-right"></i>Berdasarkan Cabang
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-chevron-right"></i>Berdasarkan Kategori
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
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority='1'>#</th>
                                <th data-priority='2'>Stock Code</th>
                                <th>Stock Name</th>
                                <th>Unit</th>
                                <th>Packaging</th>
                                <th>Category</th>
                                <th data-priority='3'>Bin</th>
                                <th data-priority='4'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stockMaster as $stock)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $stock->code_stock }}</td>
                                    <td>{{ $stock->name_stock }}</td>
                                    <td>{{ $stock->unit }}</td>
                                    <td>{{ $stock->packaging }}</td>
                                    <td>{{ $stock->stock_category }}</td>
                                    <td>{{ $stock->branch->code_branch }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('stock-master.edit', $stock->id) }}" title="Edit Data">
                                            Edit
                                        </a>

                                        <form action="{{ route('stock-master.destroy', $stock->id) }}"
                                            class="d-inline form-destroy" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End Table Stock -->
    </div>
@endsection
