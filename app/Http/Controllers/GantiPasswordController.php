<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GantiPasswordController extends Controller
{
    // Menampilkan form ubah password
    public function showChangePassword()
    {
        return view('gantipassword'); // pastikan file view 'gantipassword.blade.php' ada di folder 'resources/views'
    }

    // Memproses perubahan password
    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);

        // Ambil user yang sedang login
        $user = Auth::guard('web')->user();

        // Jika tidak login
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        // Set password baru dan simpan
        $user->password = Hash::make($request->new_password);

        if ($user->save()) {
            return back()->with('success', 'Password berhasil diubah!');
        } else {
            return back()->with('error', 'Gagal menyimpan password baru.');
        }
    }
}
