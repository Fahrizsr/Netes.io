<?php

namespace App\Http\Controllers;

use App\Models\DurasiInkubasi;
use App\Http\Requests\StoreDurasiInkubasiRequest;
use App\Http\Requests\UpdateDurasiInkubasiRequest;
use Illuminate\Http\Request;

class DurasiInkubasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $durasi = DurasiInkubasi::first();
        return view('durasingkubasi', compact('durasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inkubasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDurasiInkubasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DurasiInkubasi $durasiInkubasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DurasiInkubasi $durasiInkubasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request)
{
    $request->validate([
        'duration' => 'required|integer|min:1',
    ]);

    $duration = (int)$request->duration;

    $durasi = DurasiInkubasi::first(); // ambil baris pertama

    if ($durasi) {
        $durasi->update([
            "durasi_hari" => $duration
        ]);
    } else {    
        DurasiInkubasi::create([
            "durasi_hari" => $duration
        ]);
    }

    return redirect()->route('durasi.index')->with('success', 'Durasi berhasil diperbarui.');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DurasiInkubasi $durasiInkubasi)
    {
        //
    }
}
