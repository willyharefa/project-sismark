@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
                <li class="breadcrumb-item">Branch Customer</li>
            </ol>
        </nav>

        <form action="" method="POST" class="needs-validation form-edit">
            @csrf
            @method('POST')
            <div class="card mb-3">
                <div class="card-header">Form Branch Baru</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama & Tipe Customer</label>
                        <div class="col-sm-10">
                          <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" name="name_branch" class="form-control" placeholder="Nama Branch / Pabrik" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="type_branch" class="form-control" placeholder="Jenis Branch / Pabrik" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="pic_branch" class="form-control" placeholder="Nama PIC Branch" required>
                                </div>
                          </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" name="address_branch" class="form-control" placeholder="Alamat" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Informasi Tambahan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Deskripsikan pabrik disini / Tonase atau kapasitas produksi, dst" name="desc_branch" style="height: 100px" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </form>

        {{-- Table View --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar Branch Customer</h5>
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Nama Branch</th>
                                <th data-priority="2">Jenis Branch</th>
                                <th data-priority="4">PIC</th>
                                <th data-priority="5">Keterangan</th>
                                <th data-priority="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End Table View --}}

    </div>
@endsection