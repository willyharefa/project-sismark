@extends('components.app.layouts')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row g-3 mb-3">
                <div class="col-lg-4 order-0">
                    <div class="row gx-2">
                        <div class="col-12 mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-muted">Total Penjualan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar flex-shrink-0">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class='bx bx-wallet'></i></span>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <h4 class="ms-2 mb-0">Rp 23.200.450.000</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-muted">Total Sales Minggu Ini</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar flex-shrink-0">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class='bx bx-wallet'></i></span>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <h4 class="ms-2 mb-0">Rp 55.454.000</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="text-muted">Total Transaksi Bulan ini</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar flex-shrink-0">
                                            <span class="avatar-initial rounded bg-label-primary"><i
                                                    class='bx bx-wallet'></i></span>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <h4 class="ms-2 mb-0">23 kali</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 order-1">
                    <div class="card">
                        <div class="card-header">
                            Grafik Penjualan
                        </div>
                        <div class="card-body">
                            {!! $chart->container() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Grafik Produk
                        </div>
                        <div class="card-body">
                            {!! $productChart->container() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Grafik Penjualan Marketing
                        </div>
                        <div class="card-body">
                            {!! $salesMarketingChart->container() !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Product
                        </div>
                        <div class="card-body">
                            {!! $marketSalesBranchChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Order Statistics</h5>
                                <small class="text-muted">42.82k Total Sales</small>
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                    <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-column align-items-center gap-1">
                                    <h2 class="mb-2">8,258</h2>
                                    <span>Total Orders</span>
                                </div>
                                <div id="orderStatisticsChart"></div>
                            </div>
                            <ul class="p-0 m-0">
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="bx bx-mobile-alt"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Electronic</h6>
                                            <small class="text-muted">Mobile, Earbuds, TV</small>
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-semibold">82.5k</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-success"><i
                                                class="bx bx-closet"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Fashion</h6>
                                            <small class="text-muted">T-shirt, Jeans, Shoes</small>
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-semibold">23.8k</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-info"><i
                                                class="bx bx-home-alt"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Decor</h6>
                                            <small class="text-muted">Fine Art, Dining</small>
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-semibold">849k</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-secondary"><i
                                                class="bx bx-football"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Sports</h6>
                                            <small class="text-muted">Football, Cricket Kit</small>
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-semibold">99</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Order Statistics -->

                {{-- Market Progress Activity --}}
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h5 class="m-0 mb-2">Marketing Progress Terbaru</h5>
                        </div>
                        <div class="card-body">
                            <div class="nav-align-top mb-4">
                                <ul class="nav nav-pills mb-4" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="btn-sm nav-link active" role="tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-pill-tab-pku"
                                            aria-controls="nav-pill-tab-pku" aria-selected="true">Pekanbaru</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="btn-sm nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-pills-tab-mdn"
                                            aria-controls="nav-pills-tab-mdn" aria-selected="false"
                                            tabindex="-1">Medan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button type="button" class="btn-sm nav-link" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-pills-tab-pnk"
                                            aria-controls="nav-pills-tab-pnk" aria-selected="false"
                                            tabindex="-1">Pontianak</button>
                                    </li>
                                </ul>
                                <div class="tab-content p-0 shadow-none">
                                    <div class="tab-pane fade active show" id="nav-pill-tab-pku" role="tabpanel">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-4">
                                                <div class="avatar flex-shrink-0 me-3 pe-none">
                                                    <span class="avatar-initial rounded bg-label-primary">
                                                        <i class='bx bx-user-circle'></i>
                                                    </span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Yudha Satria</small>
                                                        <h6 class="mb-0">PT Agro Sejahtera</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <span class="text-muted">Mapping</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4">
                                                <div class="avatar flex-shrink-0 me-3 pe-none">
                                                    <span class="avatar-initial rounded bg-label-primary">
                                                        <i class='bx bx-user-circle'></i>
                                                    </span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Sintia Lestari</small>
                                                        <h6 class="mb-0">PT STC Indonesia</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <span class="text-muted">Penetrasi</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4">
                                                <div class="avatar flex-shrink-0 me-3 pe-none">
                                                    <span class="avatar-initial rounded bg-label-primary">
                                                        <i class='bx bx-user-circle'></i>
                                                    </span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Sintia Lestari</small>
                                                        <h6 class="mb-0">PT Ruang Tama</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <span class="text-muted">Negosiasi</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4">
                                                <div class="avatar flex-shrink-0 me-3 pe-none">
                                                    <span class="avatar-initial rounded bg-label-primary pe-none">
                                                        <i class='bx bx-user-circle'></i>
                                                    </span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Dwi Purwanti</small>
                                                        <h6 class="mb-0">PT Jaya Makmur</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <span class="text-muted">Introduction</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4">
                                                <div class="avatar flex-shrink-0 me-3 pe-none">
                                                    <span class="avatar-initial rounded bg-label-primary">
                                                        <i class='bx bx-user-circle'></i>
                                                    </span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <small class="text-muted d-block mb-1">Yudha Satria</small>
                                                        <h6 class="mb-0">PT Podomoro</h6>
                                                    </div>
                                                    <div class="user-progress d-flex align-items-center gap-1">
                                                        <span class="text-muted">Deals PO</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="nav-pills-tab-mdn" role="tabpanel">
                                        <p>
                                            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat
                                            cake ice
                                            cream. Gummies
                                            halvah
                                            tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                                            cheesecake
                                            fruitcake.
                                        </p>
                                        <p class="mb-0">
                                            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie
                                            tiramisu
                                            halvah cotton candy
                                            liquorice caramels.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="nav-pills-tab-pnk" role="tabpanel">
                                        <p>
                                            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat
                                            cake ice
                                            cream. Gummies
                                            halvah
                                            tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                                            cheesecake
                                            fruitcake.
                                        </p>
                                        <p class="mb-0">
                                            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie
                                            tiramisu
                                            halvah cotton candy
                                            liquorice caramels.
                                        </p>
                                    </div>
                                    <!--/ Expense Overview -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-backdrop fade"></div>
                </div>

                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Transactions</h5>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/paypal.png" alt="User"
                                            class="rounded" />
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">Paypal</small>
                                            <h6 class="mb-0">Send money</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">+82.6</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/wallet.png" alt="User"
                                            class="rounded" />
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">Wallet</small>
                                            <h6 class="mb-0">Mac'D</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">+270.69</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/chart.png" alt="User"
                                            class="rounded" />
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">Transfer</small>
                                            <h6 class="mb-0">Refund</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">+637.91</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/cc-success.png" alt="User"
                                            class="rounded" />
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">Credit Card</small>
                                            <h6 class="mb-0">Ordered Food</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">-838.71</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/wallet.png" alt="User"
                                            class="rounded" />
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">Wallet</small>
                                            <h6 class="mb-0">Starbucks</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">+203.33</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="../assets/img/icons/unicons/cc-warning.png" alt="User"
                                            class="rounded" />
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <small class="text-muted d-block mb-1">Mastercard</small>
                                            <h6 class="mb-0">Ordered Food</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">-92.45</h6>
                                            <span class="text-muted">USD</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Transactions -->
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $productChart->script() }}
    {{ $salesMarketingChart->script() }}
    {{ $marketSalesBranchChart->script() }}
@endpush
