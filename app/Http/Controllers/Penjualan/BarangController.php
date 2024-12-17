<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\RiwayatStokBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        $jenisbarang = JenisBarang::all();
        $riwayatStok = RiwayatStokBarang::all();

        $data = [
            'barang'  => $barang,
            'jenisBarang'  => $jenisbarang,
            'riwayatStok'  => $riwayatStok,
        ];
        return view('penjual.stok barang.index', $data);
    }
    public function store(Request $request){
        // dd('test');
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_barang' => 'required|int|max:1000',
            'jenis_barang_id' => 'required|int|max:255',
        ]);

        $params1 = $request->all();

        $barang = Barang::create($params1);
        $params2['barang_id'] = $barang->id;
        $params2['nama_barang'] = $barang->nama_barang;
        $params2['stok'] = $barang->stok_barang;
        $params2['status'] = 'Penambahan Barang Dan Stok Barang';
        $params2['tanggal_stok'] = Carbon::now();
        $riwayatStok = RiwayatStokBarang::create($params2);
        if ($barang && $riwayatStok) {
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }
        return redirect()->route('Penjual.barang.index');
    }
    public function update(Request $request, $id){
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok_barang' => 'required|int|max:1000',
            'jenis_barang_id' => 'required|int|max:255',
        ]);

        $params1 = $request->all();
        $barang = Barang::findOrFail(Crypt::decrypt($id));
        $barang->update($params1);
        $params2['barang_id'] = $barang->id;
        $params2['nama_barang'] = $barang->nama_barang;
        $params2['stok'] = $barang->stok_barang;
        $params2['status'] = 'Perubahan Barang atau stok barang';
        $params2['tanggal_stok'] = Carbon::now();
        $riwayatStok = RiwayatStokBarang::create($params2);
        if ($barang && $riwayatStok) {
            alert()->success('success', 'Data berhasil diperbarui');
        } else {
            alert()->error('Error', 'Data Gagal Diperbarui');
        }
        return redirect()->route('Penjual.barang.index');
    }
    public function destroy( $id){
        $barang = Barang::findOrFail(Crypt::decrypt($id));
        $params2['barang_id'] = $barang->id;
        $params2['nama_barang'] = $barang->nama_barang;
        $params2['stok'] = $barang->stok_barang;
        $params2['status'] = 'Penghapusan Barang Dan Stok Barang';
        $params2['tanggal_stok'] = Carbon::now();
        $riwayatStok = RiwayatStokBarang::create($params2);

        if ($barang->delete() && $riwayatStok) {
            alert()->success('Success', 'Data Berhasil Dihapus');
        } else {
            alert()->error('Error', 'Data Gagal Dihapus');
        }
        return redirect()->route('Penjual.barang.index');
    }

    public function tambahStokBarang(Request $request, $id){
        $request->validate([
            'stok_barang' => 'required|int|max:1000',
        ]);
        $dataBarang = Barang::where('id', Crypt::decrypt($id))->first();

        // $params1 = $request->all();
        $params1['stok_barang'] = $request->stok_barang + $dataBarang->stok_barang;
        $barang = Barang::findOrFail(Crypt::decrypt($id));
        $barang->update($params1);
        $params2['barang_id'] = $barang->id;
        $params2['nama_barang'] = $barang->nama_barang;
        $params2['stok'] = $request->stok_barang;
        $params2['status'] = 'Perubahan Barang atau stok barang';
        $params2['tanggal_stok'] = Carbon::now();
        $riwayatStok = RiwayatStokBarang::create($params2);
        if ($barang && $riwayatStok) {
            alert()->success('success', 'Data berhasil diperbarui');
        } else {
            alert()->error('Error', 'Data Gagal Diperbarui');
        }
        return redirect()->route('Penjual.barang.index');
    }
}
