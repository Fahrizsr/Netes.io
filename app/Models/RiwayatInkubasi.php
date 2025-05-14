<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatInkubasi extends Model
{
     use HasFactory;

    protected $table = 'riwayat_inkubasi';

    protected $fillable = ['id_durasi'];

    public function durasiInkubasi()
    {
        return $this->belongsTo(DurasiInkubasi::class, 'id_durasi');
    }

    public function suhu()
    {
        return $this->hasMany(Suhu::class, 'id_riwayat');
    }

    public function kelembaban()
    {
        return $this->hasMany(Kelembaban::class, 'id_riwayat');
    }

    public function rotasiTelur()
    {
        return $this->hasMany(RotasiTelur::class, 'id_riwayat');
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'id_riwayat');
    }
}
