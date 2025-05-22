<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKelamin;

class JeniskelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $gender = $request->input('selectedGender');

        $genderValue = match(strtolower($gender)) {
            'jantan' => 1,
            'betina' => 2,
            'seimbang', 'jantan dan betina' => 3,
            default => null
        };

        if (!$genderValue) {
            return back()->with('error', 'Jenis kelamin tidak valid.');
        }

        JenisKelamin::create([
            'jenis_kelamin' => $genderValue,
            'id_riwayat' => 1 
        ]);

        return back()->with('success', 'Jenis kelamin berhasil disimpan!');
 }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gender = $request->input('selectedGender');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
