<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotasiTelur extends Model
{
    use HasFactory;

    protected $table = 'rotasi_telur';

    protected $primaryKey = 'id_rotasi'; 

    protected $fillable = ['jumlah_rotasi', 'jam_rotasi', 'tanggal_rotasi'];

    // public function riwayatInkubasi()
    // {
    //     return $this->belongsTo(RiwayatInkubasi::class, 'id_riwayat');
    // }
}
