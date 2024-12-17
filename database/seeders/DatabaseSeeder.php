<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisBarang;
use App\Models\Penjual;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = User::create([
            'email' => 'penjual@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'penjual',
        ]);
        if ($user) {
            Penjual::create([
                'name' => 'miftah',
                'user_id' => $user->id,
            ]);
        }
        $konsumsi = JenisBarang::create([
            'jenis_barang' => 'Konsumsi',
        ]);
        $pembersih = JenisBarang::create([
            'jenis_barang' => 'Pembersih',
        ]);

         // Data barang
        $dataBarang = [
            [
                'jenis_barang_id' => $konsumsi->id,
                'nama_barang' => 'Kopi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => $konsumsi->id,
                'nama_barang' => 'Teh',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => $pembersih->id,
                'nama_barang' => 'Pasta Gigi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => $pembersih->id,
                'nama_barang' => 'Sabun Mandi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => $pembersih->id,
                'nama_barang' => 'Sampo',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('barangs')->insert($dataBarang);

         // Data riwayat stok barang
        $dataRiwayatBarang = [
            [
                'barang_id' => 1,
                'nama_barang' => 'Kopi',
                'stok' => 100,
                'status' => 'Penambahan Barang Dan Stok Barang',
                'tanggal_stok' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 2,
                'nama_barang' => 'Teh',
                'stok' => 100,
                'status' => 'Penambahan Barang Dan Stok Barang',
                'tanggal_stok' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 3,
                'nama_barang' => 'Pasta Gigi',
                'stok' => 100,
                'status' => 'Penambahan Barang Dan Stok Barang',
                'tanggal_stok' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 4,
                'nama_barang' => 'Sabun Mandi',
                'stok' => 100,
                'status' => 'Penambahan Barang Dan Stok Barang',
                'tanggal_stok' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'barang_id' => 5,
                'nama_barang' => 'Sampo',
                'stok' => 100,
                'status' => 'Penambahan Barang Dan Stok Barang',
                'tanggal_stok' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        // Insert data ke tabel 'barangs'
        DB::table('riwayat_stok_barangs')->insert($dataRiwayatBarang);
    }
}
