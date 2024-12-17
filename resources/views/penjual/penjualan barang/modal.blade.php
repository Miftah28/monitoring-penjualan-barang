<!-- tambah Barang --->
<div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Penambahan penjualan Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Penjual.barang-terjual.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-12 mb-3">
                                <label for="nama_barang" class="form-label"><span style="color: red;">*</span>
                                    Nama Barang</label>
                                <select class="selectpicker" data-live-search="true" data-width="100%" name="barang_id"
                                    required>
                                    <option value="">Pilih Jenis Barang</option>
                                    @forelse ($barang as $barangTerjuals)
                                    <option value="{{ $barangTerjuals->id }}">{{ $barangTerjuals->nama_barang }}</option>
                                    @empty
                                    <option value="NULL">Nama Barang Belum DiInput</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="jumlah_terjual" class="form-label"><span style="color: red;">*</span>
                                    Barang Terjual</label>
                                <input id="jumlah_terjual" type="number" class="form-control" name="jumlah_terjual" required>
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
@foreach ($barangTerjual as $barangTerjuals )
<div class="modal fade" id="edit{{$barangTerjuals->id}}" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit penjualan Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Penjual.barang-terjual.update', Crypt::encrypt($barangTerjuals->id)) }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-12 mb-3">
                                <label for="nama_barang" class="form-label"><span style="color: red;">*</span>
                                    Nama Barang</label>
                                <select class="selectpicker" data-live-search="true" data-width="100%"
                                    name="barang_id" id="barang_idedit{{ $barangTerjuals->id }}" required>
                                    <option value="">Pilih Barang</option>
                                    @forelse ($barang as $jenisbarangTerjuals)
                                    <option value="{{ $jenisbarangTerjuals->id }}" {{ $barangTerjuals->barang_id ==
                                        $jenisbarangTerjuals->id ?
                                        'selected' : ''
                                        }}>
                                        {{ $jenisbarangTerjuals->nama_barang }}</option>
                                    @empty
                                    <option value="NULL">Nama Barang belum diinput</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="jumlah_terjual" class="form-label"><span style="color: red;">*</span>
                                    Barang Terjual</label>
                                <input id="jumlah_terjual" type="number" class="form-control" name="jumlah_terjual"
                                    value="{{ $barangTerjuals->jumlah_terjual }}">
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

<!-- delete barang -->
<div class="modal fade" id="delete{{ $barangTerjuals->id }}" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Penjual.barang-terjual.destroy', Crypt::encrypt($barangTerjuals->id)) }}">
                    @csrf
                    @method('DELETE')
                    <h4 class="text-center">Apakah Anda Yakin Menghapus Data Ini?</h4>
                    <h5 class="text-center">Nama Barang: {{ $barangTerjuals->barang->nama_barang }} </h5>
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
