@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Personalia</li>
            </ol>
        </nav>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        <form action="{{ route('customer-personalia.store') }}" method="POST" class="needs-validation form-create">
            @csrf
            @method('POST')
            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
            <div class="card mb-3">
                <div class="card-header">Form Personalia</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="name_personalia" class="form-label">Nama Personalia</label>
                            <input type="text" class="form-control" id="name_personalia" name="name_pic" autocomplete="off" title="Nama personalia" required>
                        </div>
                        <div class="col-md-4">
                            <label for="position" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="position" name="position" autocomplete="off" title="Jabatan Personalia" required>
                        </div>
                        <div class="col-md-4">
                            <label for="phone_number" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" autocomplete="off" title="Nomor Telepon" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>

        <div class="card mb-3">
            <div class="card-header">List Personalia Customer</div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Nama Personalia</th>
                                <th data-priority="2">Jabatan</th>
                                <th data-priority="4">No Telp</th>
                                <th data-priority="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->customer_personalia as $key => $personalias)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $personalias->name_pic }}</td>
                                    <td>{{ $personalias->position }}</td>
                                    <td>{{ $personalias->phone_number }}</td>
                                    <td>
                                        <a href="{{ route('customer-personalia.show', $personalias->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="" method="POST" class="needs-validation d-inline-block form-destroy">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection