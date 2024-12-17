<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JenisBarang extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'jenis_barang',
    ];

    public function barang(){
        return $this->hasMany('App\Models\Barang');
    }
}
