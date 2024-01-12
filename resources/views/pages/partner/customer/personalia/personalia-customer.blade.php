@extends('components.app.layouts')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Personalia</li>
            </ol>
        </nav>

        <div class="card mb-3">
            <div class="card-body">
                Form Data Baru
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">List Personalia Customer</div>
            <div class="card-body">
                <div class="text-nowrap">
                    <table class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="0">#</th>
                                <th data-priority="1">Nama Personalia</th>
                                <th data-priority="2">Jabatan</th>
                                <th data-priority="4">No Telp</th>
                                <th data-priority="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->customer_personalia as $key => $personalias)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $personalias->name_pic }}</td>
                                    <td>{{ $personalias->position }}</td>
                                    <td>{{ $personalias->phone_number }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection