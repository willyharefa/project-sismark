@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('quotation.index') }}">Penawaran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>

        {{-- card quotation --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('quotation.update', $quotation->id) }}" method="POST" class="needs-validation form-edit">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Informasi Penawaran</label>
                        <div class="col-sm-10">
                            <div class="row g-2 mb-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="no_sp" placeholder="SP.PKU/2023/021" title="Nomor SP" value="{{ $quotation->no_sp }}" required>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select select-box" name="type_expedition" title="Tipe Ekspedisi" required>
                                        <option value="" selected>Pilih Ekspedisi</option>
                                        <option value="Franco" {{ $quotation->type_expedition == "Franco" ? "selected" : "" }}>Franco</option>
                                        <option value="Loco" {{ $quotation->type_expedition == "Loco" ? "selected" : "" }}>Loco</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select select-box" name="type_payment" title="Pembayaran" required>
                                        <option value="" selected>Pilih Payment</option>
                                        <option value="Cash" {{ $quotation->type_payment == "Cash" ? "selected" : "" }}>Cash</option>
                                        <option value="15H" {{ $quotation->type_payment == "15H" ? "selected" : "" }}>15 Hari</option>
                                        <option value="30H" {{ $quotation->type_payment == "30H" ? "selected" : "" }}>30 Hari</option>
                                        <option value="60H" {{ $quotation->type_payment == "60H" ? "selected" : "" }}>60 Hari</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Masukan remark penawaran" name="remark" style="height: 130px" required>{{ $quotation->remark }}</textarea>
                                        <label for="floatingTextarea">Remark</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                </form>
            </div>
        </div>
        {{-- End card --}}
    </div>
@endsection
