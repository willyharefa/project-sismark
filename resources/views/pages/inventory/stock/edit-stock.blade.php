@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('stock-master.index') }}">Stock Master</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>

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

        {{-- Form Stock --}}
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Data</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('stock-master.update', $stockMaster) }}" method="POST" class="needs-validation form-edit">
                    @csrf
                    @method('PUT')
                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label for="code_stock" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control @error('code_stock') is-invalid @enderror" id="code_stock" name="code_stock" placeholder="MEICHEM SC 02" value="{{ $stockMaster->code_stock }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="name_stock" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('name_stock') is-invalid @enderror" id="name_stock" name="name_stock" placeholder="Alkalinity Booster" value="{{ $stockMaster->name_stock }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="unit" class="form-label">Satuan</label>
                            <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" placeholder="Pcs" value="{{ $stockMaster->unit }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="packaging" class="form-label">Kemasan</label>
                            <input type="text" class="form-control @error('packaging') is-invalid @enderror" id="packaging" name="packaging" placeholder="25Kg/zak" value="{{ $stockMaster->packaging }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="stock_category" class="form-label">Kemasan</label>
                            <select class="form-select select-box @error('stock_category') is-invalid @enderror" name="stock_category" required>
                                <option value="" selected>Pilih Kategori</option>
                                <option value="General Chemical" {{ $stockMaster->stock_category == "General Chemical" ? "selected" : ""  }}>General Chemical</option>
                                <option value="Specialty Chemical" {{ $stockMaster->stock_category == "Specialty Chemical" ? "selected" : ""  }}>Specialty Chemical</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="branch_id" class="form-label">Bin</label>
                            <select class="form-select select-box @error('branch_id') is-invalid @enderror" id="branch_id" name="branch_id" required>
                                <option selected value="">Pilih Bin</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $stockMaster->branch_id == $branch->id ? "selected" : "" }}>{{ $branch->code_branch }}</option>
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
    </div>
@endsection
