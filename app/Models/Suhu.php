<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suhu extends Model
{
    use HasFactory;

    protected $table = 'suhu';

    protected $fillable = ['suhu', 'waktu_perekaman', 'id_riwayat'];

    protected $casts = [
        'waktu_perekaman' => 'datetime',
    ];

    public function riwayatInkubasi()
    {
        return $this->belongsTo(RiwayatInkubasi::class, 'id_riwayat');
    }
}
