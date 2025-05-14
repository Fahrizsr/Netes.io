<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';

    protected $fillable = ['pesan', 'id_riwayat'];

    public function riwayatInkubasi()
    {
        return $this->belongsTo(RiwayatInkubasi::class, 'id_riwayat');
    }
}
