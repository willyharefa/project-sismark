@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('invoice.index') }}">Invoices</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Price</li>
            </ol>
        </nav>

        {{-- Alert Success --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-info alert-dismissible text-black" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- card update price invoice item --}}
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Masukan Harga Invoice</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateSppbItemPrice', $sppbItem->id) }}" class="form-edit" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">Kode Produk</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" disabled value="{{ $sppbItem->stock_master->code_stock }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">Nama Produk</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" disabled value="{{ $sppbItem->stock_master->name_stock }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">QTY</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qty" disabled value="{{ $sppbItem->qty }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">Harga</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control number-input" name="price" id="price" value="" title="Harga/Produk" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">Total Harga</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" disabled id="show_total_price" value="" title="Total Harga">
                                <input type="hidden" id="total_price" value="" name="total_price">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                            <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End update price invoice item --}}
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
    {{-- SUM Price*qty --}}
    <script>
        // qty.oninput = onchange;
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
