@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">Menu Sales</h4>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        <div class="row g-3">
            <div class="col md-6">
                {{-- card User --}}
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Form Input</h5>
                        
                        <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#informasi">
                            Tips & Informasi
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="informasi" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5">Informasi Input</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Untuk memulai menginput data sales, pastikan anda telah menginput akun user terlebih dahulu.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="needs-validation form-create">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label">Nama Pengguna</label>
                                <select class="form-select select-box-2" name="user_id" data-placeholder="Pilih user" style="width: 100%">
                                    <option value=""></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Buat Data</button>
                        </form>
                    </div>
                </div>
                {{-- End card --}}
            </div>

            <div class="col-md-6">
                {{-- Table View --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>List Sales</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-nowrap">
                            <table class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-priority="0">#</th>
                                        <th data-priority="1">Karyawan ID</th>
                                        <th data-priority="2">Nama Pengguna</th>
                                        <th data-priority="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salesUsers as $sales)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sales->user->employee_id }}</td>
                                            <td>{{ $sales->user->name }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning">Edit</button>
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
        </div>
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
