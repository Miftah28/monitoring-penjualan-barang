@extends('layouts.index')

@section('main-content')
<div class="row justify-content-between">
    <div class="col-lg-10">
        <div class="pagetitle">
            <h1>Barang</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Barang</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
    </div>
    <div class="col-lg-2 text-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create"><i
                class="bi bi-plus-lg"></i> Tambah</button>
    </div>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body overflow-auto">
                    <div class="row justify-content-between">
                        <div class="col-10">
                            <h5 class="card-title">Barang</h5>
                        </div>
                        <div class="col-2 mt-3">
                            <a href="#history" data-bs-toggle="modal" class="btn btn-success">Riwayat Stok Barang</a>
                        </div>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th class="text-center" scope="col">Nama Barang</th>
                                <th class="text-center" scope="col">Stok</th>
                                <th class="text-center" scope="col">Jenis Barang</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jenisBarang as $jenisBarangs)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>

                                    <td class="text-center">{{$jenisBarangs->nama_barang}}</td>
                                    <td class="text-center">{{$jenisBarangs->stok_barang}}</td>
                                    <td class="text-center">{{$jenisBarangs->JenisBarang->jenis_barang}}</td>
                                    <td class="text-center">
                                        <a href="#plus{{ $jenisBarangs->id }}" data-bs-toggle="modal" class="btn btn-primary"><i class="bi bi-plus"></i></a>
                                        <a href="#edit{{ $jenisBarangs->id }}" data-bs-toggle="modal" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#delete{{ $jenisBarangs->id }}" data-bs-toggle="modal"
                                            class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                    </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">Data Tidak Ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>

@include('penjual.stok barang.modal')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
