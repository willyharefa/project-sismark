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
                                        <option value="Mapping">Mapping</option>
                                        <option value="Introduction">Introduction</option>
                                        <option value="Penetration">Penetration</option>
                                        <option value="Plantest">Plantest</option>
                                        <option value="Quotation">Quotation</option>
                                        <option value="Deals PO">Deals PO</option>
                                        <option value="Supply & Maintenance">Supply & Maintenance</option>
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
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status Kegiatan</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_activity" id="progress"
                                    value="Progress" checked>
                                <label class="form-check-label" for="progress">
                                    Tandai sebagai Progress
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status_activity" id="done"
                                    value="Done">
                                <label class="form-check-label" for="done">
                                    Tandai telah selesai
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Buat Progress</button>
                </form>
            </div>
        </div>
        {{-- Form List Activities --}}


        {{-- Table Activity --}}
        <div class="card">
            <h5 class="card-header">Riwayat Aktivitas Saya</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Input</th>
                                <th>Jenis Aktivitas</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($progress as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $data->type_progress }}</td>
                                    <td>{{ $data->detail }}</td>
                                    <td>
                                        <span class="badge bg-warning">{{ $data->status }}</span>
                                    </td>
                                    <td>
                                        <form action="#" class="d-inline-block form-destroy" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-outline-danger">
                                                <span class="tf-icons bx bx-trash-alt"></span>
                                            </button>
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
