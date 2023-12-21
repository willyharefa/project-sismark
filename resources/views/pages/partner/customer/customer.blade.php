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

        {{-- Form Customer --}}
        <!--
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
        !-->
        {{-- Form Customer --}}

        <div class="card mb-3">
            <div class="card-body">
                <div class="accordion" id="accordion-data-cus-1">
                    <div class="accordion-item shadow-none">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" style="background-color: #f2f2f2" type="button" data-bs-toggle="collapse" data-bs-target="#profile-customer" aria-expanded="true">
                              Profile Perusahaan
                            </button>
                        </h2>
                        <div id="profile-customer" class="accordion-collapse collapse show">
                            <div class="accordion-body p-3">
                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <label for="name_customer" class="form-label">Nama Customer <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name_customer" title="Nama Customer Baru">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="type_business" class="form-label">Jenis Perusahaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="type_business" title="Jenis Perusahaan">
                                    </div>
                                    <div class="col-md">
                                        <label for="date_established" class="form-label">Tanggal Berdiri <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="date_established" title="Tanggal Berdiri Perusahaan">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="npwp" class="form-label">NPWP Perusahaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="npwp" title="NPWP Perusahaan">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="business_owner" class="form-label">Pemilik Perusahaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="business_owner" title="Pemilik Perusahaan">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="total_employee" class="form-label">Jumlah Karyawan <span class="text-danger">*</span></label>
                                        <select class="form-select" name="total_employee" id="total_employee">
                                            <option value="<10">&lt; 10 employee</option>
                                            <option value="11-50">11-50 employee</option>
                                            <option value="51-100">51-100 employee</option>
                                            <option value="101-500">101-500 employee</option>
                                            <option value="501-1000">501-1000 employee</option>
                                            <option value="1001-5000">1001-5000 employee</option>
                                            <option value="5001-10001">5001-10000 employee</option>
                                            <option value="10001+">10001+ employee</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Alamat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" title="Alamat Perusahaan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="city" class="form-label">Kota <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="city" title="Kota">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="country" class="form-label">Negara <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="country" title="Negara/Wilayah">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item shadow-none">
                        <h2 class="accordion-header">
                            <button class="accordion-button" style="background-color: #f2f2f2" type="button" data-bs-toggle="collapse" data-bs-target="#personalia-customer" aria-expanded="true">
                                Data Personalia (PIC)
                            </button>
                        </h2>
                        <div id="personalia-customer" class="accordion-collapse collapse show">
                            <div class="accordion-body p-3" x-data="handler()">
                                <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                    <small>Bagian ini merupakan data-data kontak customer. Kosongan dengan tanda (-) jika tidak ada.</small>
                                    <div class="mt-2 mt-md-0">
                                        <button type="button" class="btn btn-info" x-on:click="addNewContact()">+ Tambah Data</button>
                                    </div>
                                </div>
                                <template x-for="(field, index) in fields" :key="index">
                                    <div class="row g-3">
                                        <div class="col-lg-5">
                                            <label for="name_pic" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name_pic" name="name_pic[]" title="Nama Kontak">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="position" class="form-label">Jabatan</label>
                                            <input type="text" class="form-control" id="position" name="position[]" title="Jabatan">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="phone_number" class="form-label">No. Telepon</label>
                                            <input type="text" class="form-control" id="phone_number" name="phone_number[]" title="Nomor Telepon">
                                        </div>
                                        <div class="col mt-sm-auto mt-md-auto mt-3">
                                            <button type="button" class="btn btn-danger btn-small" x-on:click="removeField(index)">&times;</button>
                                        </div>
                                    </div>
                                    <div class="divider">AAAAAAA</div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
        function handler() {
            return {
            fields: [],
            addNewContact() {
                this.fields.push({
                    name_pic: '',
                    position: '',
                    phone_number: '',
                });
                },
                removeField(index) {
                this.fields.splice(index, 1);
                }
            }
        }

        $(document).ready(function() {
            $('.select-box-2').select2({
                theme: "bootstrap-5",
                allowClear: true
            })

        });
    </script>
@endpush
