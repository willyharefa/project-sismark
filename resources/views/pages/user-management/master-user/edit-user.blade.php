@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Menu User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
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

        {{-- card User --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" class="needs-validation form-edit">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="employee_id" placeholder="ID Karyawan" value="{{ $user->employee_id }}" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="name_user" placeholder="Nama Pengguna" value="{{ $user->name }}" required>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" name="gender">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="Pria" {{ $user->gender == "Pria" ? "selected" : "" }}>Pria</option>
                                        <option value="Perempuan" {{ $user->gender == "Perempuan" ? "selected" : "" }}>Perempuan</option>
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
                                    <input type="text" class="form-control" name="nickname" placeholder="Nickname" value="{{ $user->nickname }}" required>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select select-box-2" data-placeholder="Pilih posisi..." style="width: 100%" name="title_id" required>
                                        <option value=""></option>
                                        @foreach ($titles as $title)
                                            <option value="{{ $title->id }}" {{ $user->title_id == $title->id ? "selected" : "" }}>{{ $title->name_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="phone_number" placeholder="Nomor Telp." value="{{ $user->phone_number }}" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="email" class="form-control" name="email" placeholder="example@mitoindonesia.com" value="{{ $user->email }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Autentikasi & Keamanan</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Username" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select select-box-2" name="branch_id" data-placeholder="Pilih Branch" style="width: 100%" required>
                                        <option value=""></option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}" {{ $user->branch_id == $branch->id ? "selected" : "" }}>{{ $branch->code_branch }}</option>
                                        @endforeach
                                    </select>
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
