<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BarangTerjual extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'barang_id',
        'jumlah_terjual',
        'tanggal_transaki',
    ];
    public function barang()
    {
        return $this->belongsTo('App\Models\Barang');
    }
}
