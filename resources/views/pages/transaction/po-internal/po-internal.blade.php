@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold pb-3"><span class="text-muted fw-light">PO Internal</h4>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Alert Success --}}

        {{-- card Po Internal --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('po-internal.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Customer</label>
                        <div class="col-sm-5">
                            <select class="form-select select-box-2" name="customer_id" required data-placeholder="Pilih customer">
                                <option value=""></option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
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
                <h5>Daftar Item</h5>
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">No PO In</th>
                                <th data-priority="2">Customer</th>
                                <th data-priority="3">Status</th>
                                <th data-priority="4">Tanggal Input</th>
                                <th data-priority="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($poInternals as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->code_po_in }}</td>
                                    <td>{{ $data->customer->name }}</td>
                                    <td>
                                        @if ($data->status_po_in == "draf")
                                        <span class="badge bg-warning">{{ $data->status_po_in }}</span>
                                        @elseif($data->status_po_in == "request")
                                        <span class="badge bg-info">{{ $data->status_po_in }}</span>
                                        @elseif($data->status_po_in == "approved")
                                        <span class="badge bg-info">{{ $data->status_po_in }}</span>
                                        @elseif($data->status_po_in == "reject")
                                        <span class="badge bg-danger">{{ $data->status_po_in }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->created_at->format('d F Y') }}</td>
                                    <td>
                                        <div class="d-inline-block">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
    
                                                <div class="dropdown-menu" style="">
                                                    <a href="{{ route('po-internal.show', $data->id) }}" class="dropdown-item" title="Tambahkan Produk"><i class='bx bx-data'></i> Tambah Item</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('po-internal.edit', $data->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="{{ route('po-internal.destroy', $data->id) }}"><i class="bx bx-trash me-1"></i> Hapus</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-inline-block">
                                            <a class="btn btn-sm btn-info" target="_blank" href="{{ route('printPoInternal', $data->id) }}" title="Cetak Informasi">
                                                <i class='bx bxs-printer bx-xs'></i>
                                            </a>
                                            <button class="btn btn-sm btn-info" title="Lihat Selengkapnya">
                                                <i class='bx bxs-file-doc bx-xs'></i>
                                            </button>
                                        </div>


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
