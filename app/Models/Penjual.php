<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Penjual extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'user_id',
        'tanggal_transaki',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
