<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangTerjual;
use App\Models\JenisBarang;
use App\Models\RiwayatStokBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class BarangTerjualController extends Controller
{
    public function index(){
        $barangTerjual = BarangTerjual::all();
        $barang = Barang::all();
        $jenisbarang = JenisBarang::all();

        $data = [
            'barangTerjual'  => $barangTerjual,
            'barang'  => $barang,
            'jenisBarang'  => $jenisbarang,

        ];
        return view('penjual.penjualan barang.index', $data);
    }
    public function store(Request $request){
        // dd('test');
        $request->validate([
            'jumlah_terjual' => 'required|int|max:1000',
        ]);
        $dataBarang = Barang::where('id',$request->barang_id)->first();

        $params1 = $request->all();
        $params1['jumlah_terjual'] = $request->jumlah_terjual;
        $params1['stok_sebelumnya'] = $dataBarang->stok_barang;
        $barangterjual = $dataBarang->stok_barang - $request->jumlah_terjual;
        $params1['tanggal_transaksi'] = Carbon::now();
        $barangTerjual = BarangTerjual::create($params1);
        $params2['barang_id'] = $dataBarang->id;
        $params2['nama_barang'] = $dataBarang->nama_barang;
        $params2['stok'] = $request->jumlah_terjual;
        $params2['status'] = 'Barang Terjual';
        $params2['tanggal_stok'] = Carbon::now();
        $riwayatStok = RiwayatStokBarang::create($params2);
        $params3['stok_barang'] = $barangterjual;
        $updateStok = $dataBarang->update($params3);
        if ($barangTerjual && $riwayatStok && $updateStok) {
            alert()->success('Success', 'Data Berhasil Disimpan');
        } else {
            alert()->error('Error', 'Data Gagal Disimpan');
        }
        return redirect()->route('Penjual.barang-terjual.index');
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jumlah_terjual' => 'required|int|min:1|max:1000',
        ]);

        $dataBarang = Barang::findOrFail($request->barang_id);

        $stoksebelumnya = BarangTerjual::where('id',Crypt::decrypt($id))->first();

        $stokbarangsebelum = $dataBarang->stok_barang + $stoksebelumnya->jumlah_terjual;

        $stokBarangBaru = $stokbarangsebelum - $request->jumlah_terjual;

        if ($stokBarangBaru < 0) {
            alert()->error('Error', 'Jumlah barang terjual melebihi stok yang tersedia.');
            return redirect()->back()->withInput();
        }

        $barangTerjual = BarangTerjual::findOrFail(Crypt::decrypt($id));
        $barangTerjual->update([
            'jumlah_terjual' => $request->jumlah_terjual,
            'tanggal_transaksi' => Carbon::now(),
        ]);

        // Perbarui stok barang di tabel `Barang`
        $dataBarang->update([
            'stok_barang' => $stokBarangBaru,
        ]);

        $riwayatStok = RiwayatStokBarang::create([
            'barang_id' => $dataBarang->id,
            'nama_barang' => $dataBarang->nama_barang,
            'stok' => $stokBarangBaru,
            'status' => 'Barang terjual sebanyak ' . $request->jumlah_terjual,
            'tanggal_stok' => Carbon::now(),
        ]);

        if ($barangTerjual && $riwayatStok) {
            alert()->success('Success', 'Data Berhasil Diperbarui');
        } else {
            alert()->error('Error', 'Data Gagal Diperbarui');
        }

        return redirect()->route('Penjual.barang-terjual.index');
    }
    public function destroy( $id){
        $barang = BarangTerjual::findOrFail(Crypt::decrypt($id));
        $params2['barang_id'] = $barang->id;
        $params2['nama_barang'] = $barang->barang->nama_barang;
        $params2['stok'] = $barang->barang->stok_barang;
        $params2['status'] = 'Penghapusan Barang Dan Stok Barang';
        $params2['tanggal_stok'] = Carbon::now();
        $riwayatStok = RiwayatStokBarang::create($params2);

        if ($barang->delete() && $riwayatStok) {
            alert()->success('Success', 'Data Berhasil Dihapus');
        } else {
            alert()->error('Error', 'Data Gagal Dihapus');
        }
        return redirect()->route('Penjual.barang-terjual.index');
    }

    public function filter(Request $request)
    {
        $request->validate([
            'filterdateawal' => 'nullable|date',
            'filterdateakhir' => 'nullable|date',
            'jenis_barang_id' => 'nullable|exists:jenis_barangs,id',
            'rendah_banyak' => 'nullable|in:rendah,banyak',
        ]);

        return DB::transaction(function () use ($request) {
            $datefrom = $request->input('filterdateawal');
            $dateto = $request->input('filterdateakhir');
            $jenis_barang_id = $request->input('jenis_barang_id');
            $rendah_banyak = $request->input('rendah_banyak');

            $query = BarangTerjual::query();

            if ($datefrom && $dateto) {
                $query->whereBetween('tanggal_transaksi', [$datefrom, $dateto]);
            } elseif ($datefrom) {
                $query->whereDate('tanggal_transaksi', '>=', $datefrom);
            } elseif ($dateto) {
                $query->whereDate('tanggal_transaksi', '<=', $dateto);
            }

            if ($jenis_barang_id) {
                $query->whereHas('barang', function ($q) use ($jenis_barang_id) {
                    $q->where('jenis_barang_id', $jenis_barang_id);
                });
            }

            if ($rendah_banyak) {
                if ($rendah_banyak == 'rendah') {
                    $query->whereHas('barang', function ($q) {
                        $q->where('jumlah_terjual', '<', 10);
                    });
                }

                elseif ($rendah_banyak == 'banyak') {
                    $query->whereHas('barang', function ($q) {
                        $q->where('jumlah_terjual', '>=', 10);
                    });
                }
            }

            // Ambil data yang sudah difilter
            $filter = $query->get();

            return back()->with([
                'filtering' => $filter,
                'messages' => 'Data berhasil difilter',
                'status' => 'success',
                'datefrom' => $datefrom,
                'dateto' => $dateto,
                'jenis_barang_id' => $jenis_barang_id,
                'rendah_banyak' => $rendah_banyak,
            ]);
        });
    }

}
