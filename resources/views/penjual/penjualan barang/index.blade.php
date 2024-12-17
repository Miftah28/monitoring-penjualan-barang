@extends('layouts.index')

@section('main-content')
<div class="row justify-content-between">
    <div class="col-lg-10">
        <div class="pagetitle">
            <h1>Penjualan Barang</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Penjualan Barang</li>
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
                    <form method="POST" action="{{ route('Penjual.barang-terjual.filter') }}" style="display:inline;">
                        @csrf
                        <div class="row justify-content-between">
                            <!-- Judul Filter -->
                            <div class="col-md-2">
                                <h5 class="card-title">Penjualan Barang</h5>
                            </div>

                            <!-- Filter Jenis Barang -->
                            <div class="col-md-2 mt-3">
                                <label for="jenis_barang_id" class="form-label">Jenis Barang</label>
                                <select id="jenis_barang_id" class="selectpicker form-control" data-live-search="true"
                                    data-width="100%" name="jenis_barang_id">
                                    <option value="">Pilih Jenis Barang</option>
                                    @forelse ($jenisBarang as $jenisBarangs)
                                    <option value="{{ $jenisBarangs->id }}" {{
                                        session('jenis_barang_id')==$jenisBarangs->id ? 'selected' : '' }}>
                                        {{ $jenisBarangs->jenis_barang }}
                                    </option>
                                    @empty
                                    <option value="NULL">Jenis Barang Belum DiInput</option>
                                    @endforelse
                                </select>
                            </div>

                            <!-- Filter Rendah Banyak -->
                            <div class="col-md-2 mt-3">
                                <label for="rendah_banyak" class="form-label">Rendah/Banyak</label>
                                <select id="rendah_banyak" class="selectpicker form-control" data-live-search="true"
                                    data-width="100%" name="rendah_banyak">
                                    <option value="">Pilih Opsi</option>
                                    <option value="rendah" {{ session('rendah_banyak')=='rendah' ? 'selected' : '' }}>
                                        Rendah</option>
                                    <option value="banyak" {{ session('rendah_banyak')=='banyak' ? 'selected' : '' }}>
                                        Banyak</option>
                                </select>
                            </div>

                            <!-- Filter Tanggal Awal -->
                            <div class="col-md-2 mt-3">
                                <label for="filterdateawal" class="form-label">Tanggal Awal</label>
                                <input type="date" id="filterdateawal" class="form-control" name="filterdateawal"
                                    value="{{ session('datefrom') }}" placeholder="Tanggal Awal">
                            </div>

                            <!-- Filter Tanggal Akhir -->
                            <div class="col-md-2 mt-3">
                                <label for="filterdateakhir" class="form-label">Tanggal Akhir</label>
                                <input type="date" id="filterdateakhir" class="form-control" name="filterdateakhir"
                                    value="{{ session('dateto') }}" placeholder="Tanggal Akhir">
                            </div>

                            <!-- Tombol Filter -->
                            <div class="col-md-2 mt-4 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-filter"></i> Filter
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Table with stripped rows -->
                    <table class="table datatable mt-4">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th class="text-center" scope="col">Nama Barang</th>
                                <th class="text-center" scope="col">Stok</th>
                                <th class="text-center" scope="col">Jumlah Terjual</th>
                                <th class="text-center" scope="col">Tanggal Transaksi</th>
                                <th class="text-center" scope="col">Jenis Barang</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty(session('filtering')))
                            @forelse ($barangTerjual as $barangTerjuals)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $barangTerjuals->barang->nama_barang }}</td>
                                <td class="text-center">{{ $barangTerjuals->stok_sebelumnya }}</td>
                                <td class="text-center">{{ $barangTerjuals->jumlah_terjual }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($barangTerjuals->tanggal_transaksi)->translatedFormat('d F
                                    Y') }}
                                </td>
                                <td class="text-center">{{ $barangTerjuals->barang->jenisbarang->jenis_barang }}</td>
                                <td class="text-center">
                                    <a href="#edit{{ $barangTerjuals->id }}" data-bs-toggle="modal"
                                        class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="#delete{{ $barangTerjuals->id }}" data-bs-toggle="modal"
                                        class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="7">Data Tidak Ditemukan</td>
                            </tr>
                            @endforelse
                            @else
                            @forelse (session('filtering') as $filter)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $filter->barang->nama_barang }}</td>
                                <td class="text-center">{{ $filter->stok_sebelumnya }}</td>
                                <td class="text-center">{{ $filter->jumlah_terjual }}</td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($filter->tanggal_transaksi)->translatedFormat('d F Y') }}
                                </td>
                                <td class="text-center">{{ $filter->barang->jenisbarang->jenis_barang }}</td>
                                <td class="text-center">
                                    <a href="#edit{{ $filter->id }}" data-bs-toggle="modal" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="#delete{{ $filter->id }}" data-bs-toggle="modal" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="7">Data Tidak Ditemukan</td>
                            </tr>
                            @endforelse
                            @endif
                        </tbody>
                    </table>

                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>

@include('penjual.penjualan barang.modal')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
