@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- This page plugin CSS -->
        <!-- <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet"> -->
        @vite('resources/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')
        @vite('resources/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css')
    </head>
    <div class="row">
        <div class="col-12">
            <div class="row mb-0">
                <div class="col-lg-9 col-xl-10">
                    <h4 class="mb-3"></h4>
                </div>
                <div class="col-lg-3 col-xl-2">
                    <div class="d-grid gap-2">
                        <a href="{{ route('barang.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah
                            Barang</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Note : </h4>
                    <h6 class="card-subtitle">Tabel ini digunakan untuk menampilkan seluruh isi database tabel
                        <code> $().Barangs();</code>. Bisa ditambahkan melalui button di atas
                    </h6>
                    
                    <div class="table-responsive">
                        <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Satuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang_sakkarepmu)
                                    <tr>
                                        <td>{{ $barang_sakkarepmu->kode_barang }}</td>
                                        <td>{{ $barang_sakkarepmu->nama_barang }}</td>
                                        {{-- formatting rupiah --}}
                                        <td>{{ number_format($barang_sakkarepmu->harga_barang, 0, ',', '.') }}</td>
                                        <td>{{ $barang_sakkarepmu->deskripsi_barang }}</td>
                                        <td>{{ $barang_sakkarepmu->Satuan->kode_satuan }}</td>
                                        <td>@include('barang.actions')</td>
                                    </tr>
                                @endforeach
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')
    @vite('resources/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js')
    @vite('resources/dist/js/pages/datatable/datatable-basic.init.js')
@endsection
