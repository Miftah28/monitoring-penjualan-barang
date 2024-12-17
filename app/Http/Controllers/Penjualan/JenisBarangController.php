<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JenisBarangController extends Controller
{
    public function index(){
        $jenisBarang = JenisBarang::all();

        $data = [
            'jenisBarang'  => $jenisBarang,

        ];
        return view('penjual.jenis barang.index', $data);
    }
    public function store(Request $request){
        // dd('test');
        $request->validate([
            'jenis_barang' => 'required|string|max:255',
        ]);


        $params1 = $request->all();

        $jenisBarang = JenisBarang::create($params1);
        if ($jenisBarang) {
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }
        return redirect()->route('Penjual.jenis-barang.index');
    }
    public function update(Request $request, $id){
        $request->validate([
            'jenis_barang' => 'required|string|max:255',
        ]);

        $params1 = $request->all();
        $jenisBarang = JenisBarang::findOrFail(Crypt::decrypt($id));
        if ($jenisBarang->update($params1)) {
            alert()->success('success', 'Data berhasil diperbarui');
        } else {
            alert()->error('Error', 'Data Gagal Diperbarui');
        }
        return redirect()->route('Penjual.jenis-barang.index');
    }
    public function destroy( $id){
        $jenisBarang = JenisBarang::findOrFail(Crypt::decrypt($id));

        if ($jenisBarang->delete()) {
            alert()->success('Success', 'Data Berhasil Dihapus');
        } else {
            alert()->error('Error', 'Data Gagal Dihapus');
        }
        return redirect()->route('Penjual.jenis-barang.index');
    }
}
