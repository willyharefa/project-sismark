@extends('components.app.layouts ')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">Aktivitas Saya</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Progress</li>
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

        {{-- Alert Errors --}}
        @foreach ($errors->all() as $message)
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        {{-- Alert Error --}}

        {{-- Form List Activities --}}
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('progress.store') }}" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="customer" class="col-sm-2 col-form-label">Kode Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                            <input type="text" class="form-control" id="code_activity"
                                value="{{ $activity->code_activity }}" readonly required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="date_activity" class="col-sm-2 col-form-label">Progress Terkini</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="date_activity" name="date_activity"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" name="type_activity" required>
                                        <option value="" selected>Pilih aktivitas...</option>
                                        <option value="mapping">Mapping</option>
                                        <option value="introduction">Introduction</option>
                                        <option value="penetration">Penetration</option>
                                        <option value="jartest">Jartest</option>
                                        <option value="quotation">Quotation</option>
                                        <option value="deals">Deals PO</option>
                                        <option value="supply & maintenance">Supply & Maintenance</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Detail</label>
                        <div class="col-sm-10">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Masukan summary kegiatan" style="height: 100px" name="detail"></textarea>
                                <label for="floatingTextarea">Summary</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Progress</button>
                </form>
            </div>
        </div>
        {{-- Form List Activities --}}


        {{-- Table Activity --}}
        <div class="card">
            <h5 class="card-header">Riwayat Aktivitas Saya</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Input</th>
                                <th>Jenis Aktivitas</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($progress as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                    <td><span class="badge bg-info">{{ $data->type_progress }}</span></td>
                                    <td>{{ $data->detail }}</td>
                                    <td>
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
        <!--End Table -->
    </div>
@endsection
