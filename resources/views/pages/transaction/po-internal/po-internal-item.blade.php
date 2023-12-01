@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('po-internal.index') }}">PO Internal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
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

        {{-- Form Add Item PO Internal --}}
        @if ($poInternal->status_po_in == 'draf')
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('po-internal-item.store') }}" method="POST" class="needs-validation form-create">
                    @csrf
                    @method('POST')
                    <input type="hidden" value="{{ $poInternal->id }}" name="po_internal_id">
                    <div class="row mb-sm-5 mb-3">
                        <label class="col-sm-2 col-form-label">Detail PO In</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" disabled
                                        value="{{ $poInternal->code_po_in }}" title="Kode PO Internal" required>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" disabled
                                        value="{{ $poInternal->customer->name }}" title="Nama Customer" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" disabled
                                        value="{{ $poInternal->created_at->format('d-m-Y') }}" title="Tanggal input"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#modalPricelist">
                                    <i class='bx bx-search'></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalPricelist" tabindex="-1"
                                    aria-hidden="true"
                                    data-bs-backdrop="static"
                                    data-bs-keyboard="false"
                                    >
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Daftar Pricelists</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Kode Produk</th>
                                                                <th>Wilayah</th>
                                                                <th>Ekspedisi</th>
                                                                <th>Cash</th>
                                                                <th>15H</th>
                                                                <th>30H</th>
                                                                <th>Tanggal Berlaku</th>
                                                                <th>Exp</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($pricelists as $pricelist)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $pricelist->stock_master->code_stock }}</td>
                                                                    <td>{{ $pricelist->city->name_city }}</td>
                                                                    <td>{{ $pricelist->type_expedition }}</td>
                                                                    <td>{{ 'Rp ' . number_format($pricelist->pay_a, 0, ',', '.') }}</td>
                                                                    <td>{{ 'Rp ' . number_format($pricelist->pay_b, 0, ',', '.') }}</td>
                                                                    <td>{{ 'Rp ' . number_format($pricelist->pay_c, 0, ',', '.') }}</td>
                                                                    <td>{{ $pricelist->start_date->format('d-m-Y') }}</td>
                                                                    <td class="text-nowrap">{{ $pricelist->end_date->format('d-m-Y') }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <select class="form-select select-box-2" data-placeholder="Cari Produk"
                                    name="stock_master_id" required>
                                    <option value="" selected></option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->code_stock .' ('.$product->name_stock . ')' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">QTY</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="qty" id="qty" min="0" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Harga/satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control number-input" name="price" id="price" placeholder="Rp 30.100"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Total Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="show_total_price" value="" disabled readonly required>
                            <input type="hidden" name="total_price" id="total_price" value="" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
        @endif
        {{-- End Form --}}


        {{-- Table View --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Daftar Item</h5>
                @if ($poInternal->status_po_in == 'draf')
                    <div>
                        @if ($poInternalItem->isNotEmpty())
                            <form action="{{ route('poInternalSubmit', $poInternal->id) }}" method="POST" class="form-create">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-outline-info">Submit Data</button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Produk</th>
                                <th data-priority="1">Satuan</th>
                                <th data-priority="2">QTY</th>
                                <th data-priority="6">Harga</th>
                                <th data-priority="6">Total Harga</th>
                                @if ($poInternal->status_po_in == 'draf')
                                <th data-priority="3">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($poInternalItem as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->stock_master->code_stock }}</td>
                                    <td>{{ $data->stock_master->unit }}</td>
                                    <td>{{ $data->qty }}</td>
                                    <td>{{ 'Rp ' . number_format($data->price, 0, ',', '.') }}</td>
                                    <td>{{ 'Rp ' . number_format($data->total_price, 0, ',', '.') }}</td>
                                    @if ($poInternal->status_po_in == 'draf')
                                    <td>
                                        <form action="{{ route('po-internal-item.destroy', $data->id) }}" method="POST" class="needs-validation form-destroy">
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
        {{-- End Table --}}
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
    <script>
        qty.oninput = onchange;
        price.oninput = onchange;

        function onchange()
        {

            const valQty = qty.value || 0;
            const valPrice = price.value || 0;

            let formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(valQty * valPrice);

            
            show_total_price.value = formattedValue;

            total_price.value = valQty * valPrice;


        }
    </script>
@endpush
