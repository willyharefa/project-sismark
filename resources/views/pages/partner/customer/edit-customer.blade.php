@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>

        {{-- Alert Error --}}
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Error --}}

        {{-- Form Activities --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="text-muted">Form Data Customer</h5>
                <small class="text-muted">Informasi customer</small>
            </div>
            
            <div class="card-body">
                <form action="{{ route('customer.update', $customer->id) }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="customer" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="customer" name="name_customer"
                                        placeholder="Nama Perusahaan" autocomplete="off" title="Nama customer" value="{{ $customer->name }}" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="type_business" name="type_business"
                                        placeholder="Bidang Usaha" autocomplete="off" title="Bidang Usaha" value="{{ $customer->type_business }}" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="npwp" name="npwp"
                                        placeholder="NPWP" autocomplete="off" title="NPWP" value="{{ $customer->npwp }}" required>
                                </div>
                                <div class="col-md">
                                    <input type="date" class="form-control" id="bod" name="bod"
                                        placeholder="BOD" title="BOD" value="{{ $customer->bod }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Informasi PIC</label>
                        <div class="col-sm-10">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="name_pic_customer" placeholder="Nama PIC Customer" value="{{ $customer->pic }}" title="Nama PIC Customer" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="pic_phone" placeholder="Nomor Telepon PIC" value="{{ $customer->pic_phone }}" title="Nomor Telepon PIC Customer" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="pic_title" placeholder="Jabatan PIC Customer" value="{{ $customer->pic_title }}" title="Jabatan PIC Customer" autocomplete="off" required>
                                    </div>
                                    <div class="col">
                                        <select class="form-select select-box-2" name="sales_user_id" data-placeholder="Sales MITO" style="width: 100%">
                                            <option value=""></option>
                                            @foreach ($sales as $data)
                                                <option value="{{$data->id }}" {{ $customer->sales_user_id == $data->id ? "selected" : "" }}>{{ $data->user->nickname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kontak Perusahaan</label>
                        <div class="col-sm-10">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="phone_business" value="{{ $customer->phone_business }}" placeholder="No Telepon Perusahaan" title="No Telepon Perusahaan" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $customer->email }}" title="Nomor Telepon PIC Customer" autocomplete="off"/>
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="type_currency" placeholder="Rupiah" value="{{ $customer->type_currency }}" title="Jenis Mata Uang" autocomplete="off" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="address" value="{{ $customer->address }}" placeholder="Alamat Perusahaan" title="Alamat Perusahaan" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="city" placeholder="Kota" value="{{ $customer->city }}" title="Kota" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="country" placeholder="Negara" value="{{ $customer->country }}" title="Negara Customer" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Ketentuan Transaksi</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ppn" id="non-ppn" value="non-ppn" {{ $customer->ppn == "non-ppn" ? "checked" : "" }}>
                                    <label class="form-check-label" for="non-ppn">Non PPN</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ppn" id="include-ppn" value="ppn" {{ $customer->ppn == "ppn" ? "checked" : "" }}>
                                    <label class="form-check-label" for="include-ppn">PPN</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                </form>
                
            </div>
        </div>
        {{-- Form Activities --}}
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
