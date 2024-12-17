<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();

        $data = [
            'jenisBarang'  => $barang,

        ];
        return view('penjual.stok barang.index', $data);
    }
    public function store(Request $request){
        // dd('test');
        $request->validate([
            'jenis_barang' => 'required|string|max:255',
        ]);


        $params1 = $request->all();

        $barang = Barang::create($params1);
        if ($barang) {
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }
        return redirect()->route('Penjual.barang.index');
    }
    public function update(Request $request, $id){
        $request->validate([
            'jenis_barang' => 'required|string|max:255',
        ]);

        $params1 = $request->all();
        $barang = Barang::findOrFail(Crypt::decrypt($id));
        if ($barang->update($params1)) {
            alert()->success('success', 'Data berhasil diperbarui');
        } else {
            alert()->error('Error', 'Data Gagal Diperbarui');
        }
        return redirect()->route('Penjual.barang.index');
    }
    public function destroy( $id){
        $barang = Barang::findOrFail(Crypt::decrypt($id));

        if ($barang->delete()) {
            alert()->success('Success', 'Data Berhasil Dihapus');
        } else {
            alert()->error('Error', 'Data Gagal Dihapus');
        }
        return redirect()->route('Penjual.barang.index');
    }
}
