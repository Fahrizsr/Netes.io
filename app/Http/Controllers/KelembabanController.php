<?php

namespace App\Http\Controllers;

use App\Models\Kelembaban;
use App\Models\Suhu;
use App\Http\Requests\StoreKelembabanRequest;
use App\Http\Requests\UpdateKelembabanRequest;

class KelembabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelembaban::with('riwayatInkubasi')->latest()->get();
        return view('kelembaban.index', compact('data'));
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
    public function store(StoreKelembabanRequest $request)
    {
        $request->validate([
            'kelembaban' => 'required|numeric',
            'waktu_perekaman' => 'required|date',
            'id_riwayat' => 'required|exists:riwayat_inkubasi,id_riwayat',
        ]);


        Kelembaban::create($request->all());

        return redirect()->back()->with('success', 'Data kelembaban berhasil ditambahkan.');
    }

    // Endpoint untuk mengambil data kelembaban dalam format JSON (misal untuk AJAX)
    public function latest()
    {
        $kelembaban = Kelembaban::latest('waktu_perekaman')->first();
        return response()->json($kelembaban);
    }


    /**
     * Display the specified resource.
     */
    public function show(Kelembaban $kelembaban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelembaban $kelembaban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelembabanRequest $request, Kelembaban $kelembaban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelembaban $kelembaban)
    {
        //
    }
    
}
