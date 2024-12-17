<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data barang
        $data = [
            [
                'jenis_barang_id' => 1, // Konsumsi
                'nama_barang' => 'Kopi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => 1, // Konsumsi
                'nama_barang' => 'Teh',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => 3, // Pembersih
                'nama_barang' => 'Pasta Gigi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => 3, // Pembersih
                'nama_barang' => 'Sabun Mandi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => 3, // Pembersih
                'nama_barang' => 'Sampo',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data ke tabel 'barangs'
        DB::table('barangs')->insert($data);
    }
}
