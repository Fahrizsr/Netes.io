<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelembaban extends Model
{
    use HasFactory;

    protected $table = 'kelembaban';

    protected $fillable = ['kelembaban', 'waktu_perekaman', 'id_riwayat'];

    protected $casts = [
        'waktu_perekaman' => 'datetime',
    ];

    public function riwayatInkubasi()
    {
        return $this->belongsTo(RiwayatInkubasi::class, 'id_riwayat');
    }
}
