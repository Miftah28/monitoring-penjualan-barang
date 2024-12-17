@extends('layouts.index')

@section('main-content')

<div class="pagetitle">
    <div class="row justify-content-between">
        <div class="col-lg-10">
            <h1>Jenis Barang</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Jenis Barang</li>
                </ol>
            </nav>
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
                    <div class="card-body">
                        <h5 class="card-title">Jenis barang</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>Jenis Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jenisBarang as $jenisBarangs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$jenisBarangs->jenis_barang}}</td>
                                        <td><a href="#edit{{ $jenisBarangs->id }}" data-bs-toggle="modal" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#delete{{ $jenisBarangs->id }}" data-bs-toggle="modal"
                                                class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
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
