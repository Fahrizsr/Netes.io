<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotasiTelur extends Model
{
    use HasFactory;

    protected $table = 'rotasi_telur';

    protected $fillable = ['jumlah_rotasi', 'jam_rotasi', 'id_riwayat'];

    public function riwayatInkubasi()
    {
        return $this->belongsTo(RiwayatInkubasi::class, 'id_riwayat');
    }
}
