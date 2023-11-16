@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pricelist.index') }}">Menu Pricelists</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit data</li>
            </ol>
        </nav>

        {{-- Form Pricelist --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Form Edit Data</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pricelist.update', $pricelist->id) }}" method="POST" class="needs-validation form-edit">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <select class="form-select select-box @error('stock_master_id') is-invalid @enderror" name="stock_master_id" required>
                                        <option value="" selected>Pilih Produk...</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" {{ $pricelist->stock_master_id == $product->id ? "selected" : "" }}>{{ $product->code_stock }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select select-box @error('city_id') is-invalid @enderror" name="city_id" required>
                                        <option value="" selected>Pilih Wilayah...</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ $pricelist->city_id == $city->id ? "selected" : "" }} >{{ $city->name_city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control number-input @error('price') is-invalid @enderror" name="price"
                                        title="Harga Produk" placeholder="Rp 25.300" value="{{ $pricelist->price }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Berlaku sampai</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-md-5">
                                    <input type="date" class="form-control" name="start_date" value="{{ $pricelist->start_date->format('Y-m-d') }}" required>
                                </div>
                                <div class="col justify-content-center align-items-center d-flex"><span
                                        class="mb-0">s/d</span></div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="end_date" value="{{ $pricelist->end_date->format('Y-m-d') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Diskon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control number-input" name="discount" title="Diskon Produk"
                                placeholder="Masukan diskon produk..." value="{{ $pricelist->discount }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                </form>
            </div>
        </div>
        {{-- End Form --}}

    </div>
@endsection
