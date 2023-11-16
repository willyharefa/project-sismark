@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('activities.index') }}">Aktivitas Saya</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit data</li>
            </ol>
        </nav>

        {{-- Update Activities --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('activities.update', $activity->id) }}" method="POST" class="needs-validation form-edit">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="customer" class="col-sm-2 col-form-label">Customer Baru</label>
                        <div class="col-sm-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="customer" name="name_customer"
                                        placeholder="Nama Perusahaan" value="{{ $activity->name_customer }}" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="type_bussiness" name="type_bussiness"
                                        placeholder="Bidang Usaha" value="{{ $activity->type_bussiness }}" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="type_customer" name="type_customer"
                                        placeholder="Jenis Customer" value="{{ $activity->type_customer }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name_pic_customer" class="col-sm-2 col-form-label">PIC Customer</label>
                        <div class="col-sm-10">
                                <div class="row g-2">
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="name_pic_customer" name="name_pic_customer" placeholder="Nama Contact Person" value="{{ $activity->name_pic_customer }}" required/>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="position_pic" name="position_pic" placeholder="Position PIC" value="{{ $activity->position_pic }}" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="location" name="location"
                                placeholder="Pekanbaru City" value="{{ $activity->location }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                </form>
            </div>
        </div>
        {{-- End Form --}}
    </div>
@endsection
