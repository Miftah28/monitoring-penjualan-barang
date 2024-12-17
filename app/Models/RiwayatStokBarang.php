<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class RiwayatStokBarang extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'barang_id',
        'stok',
        'tanggal_stok',
        'nama_barang',
        'status',
    ];
    public function barangStok()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
