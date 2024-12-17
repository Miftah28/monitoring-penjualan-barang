<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Barang extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'jenis_barang_id',
        'nama_barang',
        'stok_barang',
    ];
    public function jenisBarang()
    {
        return $this->belongsTo('App\Models\JenisBarang');
    }

    public function barangTerjual(){
        return $this->hasMany('App\Models\BarangTerjual');
    }
    public function riwayatStokBarang(){
        return $this->hasMany('App\Models\RiwayatStokBarang');
    }
}
