@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">Menu User</h4>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- If error --}}
        @if ($message = Session::get('error'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert  --}}

        {{-- card User --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="employee_id" placeholder="ID Karyawan" autocomplete="off" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="name_user" placeholder="Nama Pengguna" autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" name="gender">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Informasi Akun</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="nickname" placeholder="Nickname" required>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select select-box-2" data-placeholder="Pilih posisi..." style="width: 100%" name="title_id" required>
                                        <option value=""></option>
                                        @foreach ($titles as $title)
                                            <option value="{{ $title->id }}">{{ $title->name_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="phone_number" placeholder="Nomor Telp." required>
                                </div>
                                <div class="col-md-3">
                                    <input type="email" class="form-control" name="email" placeholder="example@mitoindonesia.com" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Autentikasi & Keamanan</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select select-box-2" name="branch_id" data-placeholder="Pilih Branch" style="width: 100%" required>
                                        <option value=""></option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->code_branch }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Data</button>
                </form>
            </div>
        </div>
        {{-- End card --}}

        {{-- Table View --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="2">Karyawan ID</th>
                                <th data-priority="1">Nama Pengguna</th>
                                <th data-priority="5">Posisi</th>
                                <th data-priority="4">Username</th>
                                <th data-priority="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->employee_id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->title->name_title }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline-block form-destroy">
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
