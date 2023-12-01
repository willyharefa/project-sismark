@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sppb.index') }}">SPPB</a></li>
                <li class="breadcrumb-item active" aria-current="page">Input Item</li>
            </ol>
        </nav>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert --}}

        {{-- card Po Internal --}}
        <div class="card mb-4">
            <div class="card-header">
                <legend class="mb-0">Detail SPPB</legend>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Document SPPB</label>
                    <div class="col-md-10">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{ $sppb->customer->name }}" title="Nama Customer" readonly disabled>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{ $sppb->no_po_cust }}" title="No PO customer" readonly disabled>
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" value="{{ $sppb->created_at->format('Y-m-d') }}" title="Tanggal dibuat" readonly disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End card --}}

        {{-- card input item sppb --}}
        @if ($sppb->status_sppb == "draf")
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Tambah Item</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sppb-item.store') }}" method="POST" class="form-create">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="sppb_id" value="{{ $sppb->id }}">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalAddItem">
                                        <i class="bx bx-search"></i>
                                    </button>
                                    
                                    <div class="modal fade" id="modalAddItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Daftar Produk</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered table-striped" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Kode Produk</th>
                                                                <th>Nama Produk</th>
                                                                <th>Kemasan</th>
                                                                <th>Satuan</th>
                                                                <th>Kategori</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($stock_masters as $product)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $product->code_stock }}</td>
                                                                    <td>{{ $product->name_stock }}</td>
                                                                    <td>{{ $product->packaging }}</td>
                                                                    <td>{{ $product->unit }}</td>
                                                                    <td>{{ $product->stock_category }}</td>
                                                                </tr>
                                                            @empty 
                                                            <tr>
                                                                <td colspan="6">Data stock masih kosong</td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <select class="form-select select-box-2" name="stock_master_id" required data-placeholder="Kode Produk">
                                        <option value=""></option>
                                        @forelse ($stock_masters as $product)
                                            <option value="{{ $product->id }}">{{ $product->code_stock }}</option>
                                        @empty
                                            <option value="">Data masih kosong</option>
                                        @endforelse
                                    </select>
                                </div>
                    
                                <!-- Modal -->
                                
                            </div>

                            <div class="col-md-4">
                                <input type="number" class="form-control number-input" name="qty" placeholder="QTY" title="Masukan QTY produk" required>
                            </div> 

                            <div class="col-md-4">
                                <input type="text" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Simpan Item</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        {{-- end --}}

        {{-- Table View --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar Item</h5>
                @if ($sppb_items !== null)
                    @if ($sppb->status_sppb == "draf")
                        <form action="{{ route('sppbDetailSubmit', $sppb->id) }}" method="POST" class="form-submit-item-quo">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-outline-info">Submit Item</button>
                        </form>
                    @endif
                @endif
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="1">#</th>
                                <th data-priority="2">Nama Produk</th>
                                <th data-priority="3">QTY</th>
                                <th data-priority="4">Satuan</th>
                                @if ($sppb->status_sppb == "draf")
                                <th data-priority="5">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sppb_items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->stock_master->name_stock }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->stock_master->unit }}</td>
                                    @if ($sppb->status_sppb == "draf")
                                        <td>
                                            <form action="{{ route('sppb-item.destroy', $item->id) }}" method="post" class="form-destroy">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    @endif
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
