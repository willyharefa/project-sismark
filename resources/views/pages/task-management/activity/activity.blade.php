@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">Menu Kegiatan</h4>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        {{-- Alert Errors --}}
        @foreach ($errors->all() as $message)
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        {{-- Alert Error --}}

        {{-- Form Activities --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('activities.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="customer" class="col-sm-2 col-form-label">Customer Baru</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="customer" name="name_customer"
                                        placeholder="Nama Perusahaan" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="type_bussiness" name="type_bussiness"
                                        placeholder="Bidang Usaha" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="type_customer" name="type_customer"
                                        placeholder="Jenis Customer" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name_pic_customer" class="col-sm-2 col-form-label">PIC Customer</label>
                        <div class="col-sm-10">
                                <div class="row g-2">
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="name_pic_customer" name="name_pic_customer" placeholder="Nama Contact Person" required/>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="position_pic" name="position_pic" placeholder="Position PIC" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="location" name="location"
                                placeholder="Pekanbaru City" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Kegiatan</button>
                </form>
            </div>
        </div>
        {{-- Form Activities --}}


        {{-- Table Activity --}}
        <div class="card">
            <h5 class="card-header">Data Kegiatan Saya</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Tanggal Input</th>
                                <th data-priority='1'>Nama Customer</th>
                                <th>Nama CP</th>
                                <th>Tipe Customer</th>
                                <th>Jabatan</th>
                                <th>Bin</th>
                                <th data-priority='3' class="text-center">Log</th>
                                <th data-priority='2'>Progress</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $activity->code_activity }}</td>
                                <td>{{ $activity->created_at->format('d/m/Y') }}</td>
                                <td>{{ $activity->name_customer }}</td>
                                <td>{{ $activity->name_pic_customer }}</td>
                                <td>{{ $activity->type_customer }}</td>
                                <td>{{ $activity->position_pic }}</td>
                                <td>{{ $activity->location }}</td>
                                <td>
                                    <a class="fw-bold" href="{{ route('createProgress', $activity->id) }}" class="nav-link">{{ $activity->progress->count() }}</a>
                                </td>
                                <td><span class="badge bg-info">
                                    @if ($activity->type_action == null)
                                        progress
                                    @else
                                        {{ $activity->type_action }}
                                    @endif
                                    </span>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('activities.edit', $activity->id) }}">Edit</a>
                                    <form action="#" class="d-inline-block form-destroy" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
