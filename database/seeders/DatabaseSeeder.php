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
         $data = [
            [
                'jenis_barang_id' => $konsumsi->id, // Konsumsi
                'nama_barang' => 'Kopi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => $konsumsi->id, // Konsumsi
                'nama_barang' => 'Teh',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => $pembersih->id, // Pembersih
                'nama_barang' => 'Pasta Gigi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => $pembersih->id, // Pembersih
                'nama_barang' => 'Sabun Mandi',
                'stok_barang' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jenis_barang_id' => $pembersih->id, // Pembersih
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
