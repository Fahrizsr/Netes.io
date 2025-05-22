<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\DurasiInkubasi;
use App\Models\RotasiTelur;
use App\Models\Suhu;
use App\Models\Kelembaban;
use Illuminate\Support\Collection;

use App\Http\Requests\StoreNotifikasiRequest;
use App\Http\Requests\UpdateNotifikasiRequest;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data dari tabel suhu, kelembaban, rotasi, durasi inkubasi
    $suhu = Suhu::all();
    $kelembaban = Kelembaban::all();
    $rotasi = RotasiTelur::all();
    $durasi = DurasiInkubasi::all();

    $semuaData = collect();

    foreach ($suhu as $item) {
        $semuaData->push((object)[
            'waktu' => $item->created_at,
            'jam' => \Carbon\Carbon::parse($item->created_at)->format('H:i'),
            'pesan' => 'Peringatan: Suhu di luar batas wajar',
            'icon' => 'https://img.icons8.com/ios-filled/24/000000/temperature.png'
        ]);
    }

    foreach ($kelembaban as $item) {
        $semuaData->push((object)[
            'waktu' => $item->created_at,
            'jam' => \Carbon\Carbon::parse($item->created_at)->format('H:i'),
            'pesan' => 'Peringatan: Kelembaban di luar batas wajar',
            'icon' => 'https://img.icons8.com/ios-filled/24/000000/hygrometer.png'
        ]);
    }

    foreach ($rotasi as $item) {
        $semuaData->push((object)[
            'waktu' => $item->created_at,
            'jam' => \Carbon\Carbon::parse($item->created_at)->format('H:i'),
            'pesan' => 'Jadwal perubahan rotasi',
            'icon' => 'https://img.icons8.com/ios-filled/24/000000/rotate.png'
        ]);
    }

    foreach ($durasi as $item) {
        $semuaData->push((object)[
            'waktu' => $item->created_at,
            'jam' => \Carbon\Carbon::parse($item->created_at)->format('H:i'),
            'pesan' => 'Perubahan durasi inkubasi',
            'icon' => 'https://img.icons8.com/ios-filled/24/000000/time.png'
        ]);
    }

    // Urutkan berdasarkan waktu terbaru
    $semuaData = $semuaData->sortByDesc('waktu');

    // Kelompokkan berdasarkan tanggal (yyyy-mm-dd)
    $groupedRiwayat = $semuaData->groupBy(function ($item) {
        return \Carbon\Carbon::parse($item->waktu)->toDateString();
    });

    // Kirim ke view
    return view('notifikasi', compact('groupedRiwayat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotifikasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotifikasiRequest $request, Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notifikasi $notifikasi)
    {
        //
    }
}
