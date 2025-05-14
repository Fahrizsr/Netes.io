<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    // Tampilkan semua data akun
    public function index()
    {
        $akun = Akun::all();
        return view('akun.index', compact('akun'));
    }

    // Tampilkan form tambah akun
    public function create()
    {
        return view('akun.create');
    }

    // Simpan akun baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akun,email',
        ]);

        Akun::create($request->all());

        return redirect()->route('akun.index')->with('success', 'Akun berhasil ditambahkan.');
    }

    // Tampilkan satu akun
    public function show($id)
    {
        $akun = Akun::findOrFail($id);
        return view('akun.show', compact('akun'));
    }

    // Tampilkan form edit akun
    public function edit($id)
    {
        $akun = Akun::findOrFail($id);
        return view('akun.edit', compact('akun'));
    }

    // Update data akun
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akun,email,' . $id,
        ]);

        $akun = Akun::findOrFail($id);
        $akun->update($request->all());

        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui.');
    }

    // Hapus akun
    public function destroy($id)
    {
        $akun = Akun::findOrFail($id);
        $akun->delete();

        return redirect()->route('akun.index')->with('success', 'Akun berhasil dihapus.');
    }
}
