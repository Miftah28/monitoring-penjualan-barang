<!-- tambah Barang --->
<div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Penambahan Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Penjual.barang.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-12 mb-3">
                                <label for="nama_barang" class="form-label"><span style="color: red;">*</span>
                                    Nama Barang</label>
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="stok_barang" class="form-label"><span style="color: red;">*</span>
                                    Stok Barang</label>
                                <input id="stok_barang" type="number" class="form-control" name="stok_barang" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="jenis_barang" class="form-label"><span style="color: red;">*</span>
                                    Jenis Barang</label>
                                <select class="selectpicker" data-live-search="true" data-width="100%"
                                    name="jenis_barang_id" required>
                                    <option value="">Pilih Jenis Barang</option>
                                    @forelse ($jenisBarang as $jenisBarangs)
                                    <option value="{{ $jenisBarangs->id }}">{{ $jenisBarangs->jenis_barang }}</option>
                                    @empty
                                    <option value="NULL">Jenis Barang Belum DiInput</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div><!-- End Create Modal-->

<!-- edit barang -->
@foreach ($barang as $barangs )
<div class="modal fade" id="edit{{$barangs->id}}" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Penjual.barang.update', Crypt::encrypt($barangs->id)) }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-12 mb-3">
                                <label for="nama_barang" class="form-label"><span style="color: red;">*</span>
                                    Nama Barang</label>
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang"
                                    value="{{ $barangs->nama_barang }}">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="stok_barang" class="form-label"><span style="color: red;">*</span>
                                    Stok Barang</label>
                                <input id="stok_barang" type="number" class="form-control" name="stok_barang"
                                    value="{{ $barangs->stok_barang }}">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="jenis_barang" class="form-label"><span style="color: red;">*</span>
                                    Jenis Barang</label>
                                <select class="selectpicker" data-live-search="true" data-width="100%" name="jenis_barang_id"
                                    id="jenis_barang_idedit{{ $barangs->id }}" required>
                                    <option value="">Pilih Jenis Barang</option>
                                    @forelse ($jenisBarang as $jenisBarangs)
                                    <option value="{{ $jenisBarangs->id }}" {{ $barangs->jenis_barang_id == $jenisBarangs->id ?
                                        'selected' : ''
                                        }}>
                                        {{ $jenisBarangs->jenis_barang }}</option>
                                    @empty
                                    <option value="NULL">Jenis Barang belum diinput</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div><!-- End edit barang Modal-->

<!-- tambah stok barang -->
<div class="modal fade" id="plus{{$barangs->id}}" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemanmbahan Stok Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Penjual.barang.tambahStok', Crypt::encrypt($barangs->id)) }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-12 mb-3">
                                <label for="stok_barang" class="form-label"><span style="color: red;">*</span>
                                    Stok Barang</label>
                                <input id="stok_barang" type="number" class="form-control" name="stok_barang">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div><!-- End tambah stok barang Modal-->

<!-- delete barang -->
<div class="modal fade" id="delete{{ $barangs->id }}" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Penjual.barang.destroy', Crypt::encrypt($barangs->id)) }}">
                    @csrf
                    @method('DELETE')
                    <h4 class="text-center">Apakah Anda Yakin Menghapus Data Ini?</h4>
                    <h5 class="text-center">Nama Barang: {{ $barangs->nama_barang }} </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Kembali</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="history" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Riwayat Stok Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th class="text-center" scope="col">Nama Barang</th>
                            <th class="text-center" scope="col">Stok</th>
                            <th class="text-center" scope="col">tanggal Stok Barang</th>
                            <th class="text-center" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($riwayatStok as $riwayatStoks)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>

                                <td class="text-center"> {{ $riwayatStoks->nama_barang ? $riwayatStoks->nama_barang : 'Barang Tidak Ditemukan' }}</td>
                                <td class="text-center">{{$riwayatStoks->stok}}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($riwayatStoks->tanggal_stok)->translatedFormat('d F Y') }}</td>
                                <td class="text-center">
                                    {{$riwayatStoks->status}}
                                </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Data Tidak Ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>
                    Kembali</button>
            </div>
        </div>
    </div>
</div>
