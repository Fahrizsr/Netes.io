<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Suhu;
use App\Models\Kelembaban;

class KelembabanSuhuController extends Controller
{

    public function index()
    {
        return view('kelembabansuhu'); // contoh nama view
    }

    public function store(Request $request)
    {
        $idDurasi = 1;

        $idRiwayat = DB::table('riwayat_inkubasi')->insertGetId([
            'id_durasi' => $idDurasi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('suhu')->insert([
            'id_riwayat' => $idRiwayat,
            'suhu' => $request->input('suhu'),
            'waktu_perekaman' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kelembaban')->insert([
            'id_riwayat' => $idRiwayat,
            'kelembaban' => $request->input('kelembaban'),
            'waktu_perekaman' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kelembaban-suhu.index')->with('success', 'Data berhasil disimpan');
    }
}

