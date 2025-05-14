<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DurasiInkubasi extends Model
{
    use HasFactory;

    protected $table = 'durasi_inkubasi';

    protected $primaryKey = 'id_durasi';

    protected $fillable = ['durasi_hari'];

    public $timestamps = true;
}
