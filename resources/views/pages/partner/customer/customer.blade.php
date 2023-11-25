@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">Menu Customer</h4>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        {{-- Form Activities --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="text-muted">Formulir Customer Baru</h5>
                <button class="btn btn-sm btn-outline-info">Import Data</button>
            </div>
            
            <div class="card-body">
                <form action="{{ route('customer.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="customer" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="customer" name="name_customer"
                                        placeholder="Nama Perusahaan" autocomplete="off" title="Nama customer" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="type_business" name="type_business"
                                        placeholder="Bidang Usaha" autocomplete="off" title="Bidang Usaha" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="npwp" name="npwp"
                                        placeholder="NPWP" autocomplete="off" title="NPWP" required>
                                </div>
                                <div class="col-md">
                                    <input type="date" class="form-control" id="bod" name="bod"
                                        placeholder="BOD" title="BOD" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Informasi PIC</label>
                        <div class="col-sm-10">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="name_pic_customer" placeholder="Nama PIC Customer" title="Nama PIC Customer" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="pic_phone" placeholder="Nomor Telepon PIC" title="Nomor Telepon PIC Customer" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="pic_title" placeholder="Jabatan PIC Customer" title="Jabatan PIC Customer" autocomplete="off" required>
                                    </div>
                                    <div class="col">
                                        <select class="form-select select-box-2" name="pic_user_id" data-placeholder="Sales MITO" style="width: 100%">
                                            <option value=""></option>
                                            @foreach ($sales as $data)
                                                <option value="{{$data->id }}">{{ $data->user->nickname }}</option>
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
                                        <input type="text" class="form-control" name="phone_business" placeholder="No Telepon Perusahaan" title="No Telepon Perusahaan" autocomplete="off" required/>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="email" placeholder="Email" title="Nomor Telepon PIC Customer" autocomplete="off"/>
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class="form-control" name="type_currency" placeholder="Rupiah" title="Jenis Mata Uang" autocomplete="off" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="address" placeholder="Alamat Perusahaan" title="Alamat Perusahaan" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="city" placeholder="Kota" title="Kota" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="country" placeholder="Negara" title="Negara Customer" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Ketentuan Transaksi</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ppn" id="non-ppn" value="non-ppn" checked>
                                    <label class="form-check-label" for="non-ppn">Non PPN</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ppn" id="include-ppn" value="ppn">
                                    <label class="form-check-label" for="include-ppn">PPN</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
                
            </div>
        </div>
        {{-- Form Activities --}}

        {{-- Table View --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar Customer</h5>
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Nama Customer</th>
                                <th data-priority="2">Bidang Usaha</th>
                                <th data-priority="4">Kota</th>
                                <th data-priority="5">NPWP</th>
                                <th data-priority="6">Telp.</th>
                                <th data-priority="7">Status Pajak</th>
                                <th data-priority="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->type_business }}</td>
                                    <td>{{ $customer->city }}</td>
                                    <td>{{ $customer->npwp }}</td>
                                    <td>{{ $customer->phone_business }}</td>
                                    <td>{{ $customer->ppn }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{ route('customer.edit', $customer->id) }}">Edit</a>
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End Table View --}}
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
