@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">Menu Penawaran</h4>

        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}
        <div class="card mb-4">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createQuotation">
                    Buat Penawaran
                </button>

                <!-- Modal -->
                <div class="modal fade" id="createQuotation" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">List Progress Marketing</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered" id="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Nama Customer</th>
                                            <th>PIC Customer</th>
                                            <th>Sales Mito</th>
                                            <th>Bin</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($activities as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->code_activity }}</td>
                                                <td>{{ $data->name_customer }}</td>
                                                <td>{{ $data->name_pic_customer }}</td>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ $data->location }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('quotationForm', $data->id) }}">Pilih</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table View List Quotation --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Data Quotation</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-nowrap table-striped" id="table" style="width:100%">
                    <thead>
                        <tr>
                            <th data-priority='1'>#</th>
                            <th data-priority='2'>Kode Penawaran</th>
                            <th data-priority='3'>Nomor SP</th>
                            <th>Customer</th>
                            <th>Ekspedisi</th>
                            <th>Pembayaran</th>
                            <th data-priority='6'>Status</th>
                            <th>Dibuat oleh</th>
                            <th data-priority='4'>Cetak</th>
                            <th data-priority='5'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotations as $quo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $quo->code_quo }}</td>
                                <td>{{ $quo->no_sp }}</td>
                                <td>{{ $quo->activities->name_customer }}</td>
                                <td>{{ $quo->type_expedition }}</td>
                                <td>{{ $quo->type_payment }}</td>
                                <td><span class="badge rounded-pill bg-warning">{{ $quo->status_quo }}</span></td>
                                <td>{{ $quo->user->nickname }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" title="Cetak Penawaran"><i class='bx bxs-printer bx-xs'></i></button>
                                </td>
                                <td>
                                    {{-- <button class="btn btn-sm btn-info" title="Cetak Penawaran">
                                        <i class='bx bxs-printer bx-xs'></i></button>

                                    <a href="{{ route('quotation.show', $quo->id) }}" class="btn btn-sm btn-secondary"
                                        style="background-color: #198754; border-color: #198754" title="Tambahkan Produk">
                                        <i class='bx bxs-data bx-xs'></i></a>

                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button> --}}

                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>

                                        <div class="dropdown-menu" style="">
                                            <a href="{{ route('quotation.show', $quo->id) }}" class="dropdown-item" title="Tambahkan Produk"><i class='bx bx-data'></i> Tambah Produk</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Hapus</a>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- End --}}
    </div>
@endsection
