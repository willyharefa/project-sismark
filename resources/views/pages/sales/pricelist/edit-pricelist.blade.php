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
                    <div class="row mb-3 g-2">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Nama Produk</label>
                            <select class="form-select select-box @error('stock_master_id') is-invalid @enderror"
                                name="stock_master_id" required>
                                <option value="" selected>Pilih Produk</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('stock_master_id', $pricelist->stock_master_id) == $product->id ? 'selected' : '' }}>
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
                                    <option value="{{ $city->id }}"
                                        {{ old('city_id', $pricelist->city_id) == $city->id ? 'selected' : '' }}>
                                        {{ $city->name_city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Vendor</label>
                            <input type="text" class="form-control" placeholder="Nama vendor" name="vendor_id" value="{{ $pricelist->vendor_id }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Ekspedisi</label>
                            <select class="form-select select-box @error('type_expedition') is-invalid @enderror"
                                name="type_expedition" required>
                                <option value="" selected>Tipe Ekpedisi</option>
                                <option value="Franco" {{ old('type_expedition', $pricelist->type_expedition) == 'Franco' ? 'selected' : '' }}>Franco</option>
                                <option value="Loco" {{ old('type_expedition', $pricelist->type_expedition) == 'Loco' ? 'selected' : '' }}>Loco</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Harga (Cash)</label>
                            <div class="input-group col-md-3 mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control number-input" placeholder="Rp 24.038"
                                    name="pay_a" value="{{  old('pay_a', $pricelist->pay_a) }}" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Harga (15H)</label>
                            <div class="input-group col-md-3 mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control number-input" placeholder="Rp 23.000"
                                    name="pay_b" value="{{ old('pay_b', $pricelist->pay_a) }}" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Harga (30H)</label>
                            <div class="input-group col-md-3 mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control number-input" placeholder="Rp 36.408"
                                    name="pay_c" value="{{ old('pay_c', $pricelist->pay_c) }}" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Tanggal Berlaku</label>
                            <input type="date" class="form-control" name="start_date"
                                value="{{ old('start_date', $pricelist->start_date)->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Exp. Date</label>
                            <input type="date" class="form-control" name="end_date" value="{{ old('end_date', $pricelist->end_date)->format('Y-m-d') }}"
                                required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                </form>
            </div>
        </div>
        {{-- End Form --}}

    </div>
@endsection
