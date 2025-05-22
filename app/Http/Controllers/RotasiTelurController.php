<?php

namespace App\Http\Controllers;

use App\Models\RotasiTelur;
use App\Http\Requests\StoreRotasiTelurRequest;
use App\Http\Requests\UpdateRotasiTelurRequest;
use Illuminate\Http\Request;

class RotasiTelurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rotasiTelur = RotasiTelur::orderBy('created_at', 'desc')->get();
        // $rotasiTelur->transform(function ($item) {
        //     $item->jam_rotasi = date('H:i', strtotime($item->jam_rotasi));
        //     return $item;
        // });
        // return view('jadwalrotasi', compact('rotasiTelur'));
        $rotasiTelur = RotasiTelur::orderBy('created_at', 'desc')->get();
        return view('jadwalrotasi', compact('rotasiTelur'));
    }

    function indexView()
    {
        $rotasiList = RotasiTelur::all();
        return view('ubahrotasi', ['rotasiList' => $rotasiList]);
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
    public function store(Request $request)
    {
    
        // dd('store method terpanggil', $request->all());
        $request->validate([
        // 'jumlah_rotasi' => 'required|integer',
        'jam_rotasi'    => 'required|integer',
        'tanggal_rotasi' => 'required|date_format:Y-m-d',
        // 'id_riwayat'    => 'required|exists:riwayat_inkubasi,id_riwayat'
        
    ]);
    // RotasiTelur::create($request->only(['jumlah_rotasi','jam_rotasi','tanggal_rotasi']));
    RotasiTelur::create([
        'jumlah_rotasi'  => 1, // langsung set nilai 1
        'jam_rotasi'     => $request->jam_rotasi,
        'tanggal_rotasi' => $request->tanggal_rotasi,
    ]);

    return redirect()->route('jadwalrotasi.index')->with('success', 'Data rotasi berhasil disimpan');
}

    /**
     * Display the specified resource.
     */
    public function show(RotasiTelur $rotasiTelur)
    {
        return view('jadwalrotasi', ['rotasiTelur' => $rotasiTelur]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editView()
    {
        $rotasiList = RotasiTelur::all();
        return view('ubahrotasi', ['rotasiList' => $rotasiList]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRotasiTelurRequest $request, RotasiTelur $rotasiTelur)
    {
        $request->validate([
            'jumlah_rotasi' => 'required|integer|min:1',
            'jam_rotasi' => 'required|date_format:H:i',
            'id_riwayat'    => 'required|exists:riwayat_inkubasi,id_riwayat'

        ]);

        $rotasi = RotasiTelur::findOrFail($rotasiTelur->id_rotasi);
        $rotasi->update($request->only('jumlah_rotasi', 'jam_rotasi'));

        return redirect()->route('jadwalrotasi')->with('success', 'Data rotasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RotasiTelur $rotasiTelur)
    {
        $rotasi = RotasiTelur::findOrFail($rotasiTelur->id_rotasi);
        $rotasi->delete();
        return redirect()->route('ubahrotasi.index')->with('success', 'Data rotasi berhasil dihapus');
    }
}
