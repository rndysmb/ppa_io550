<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anak;

class MentorController extends Controller
{
    /**
     * Menampilkan daftar anak dari mentor yang sedang login.
     */
    public function dataAnak()
    {
        $mentor = Auth::guard('mentor')->user();
        $anakList = Anak::where('mentor_id', $mentor->id)->get();

        return view('mentor.data_anak', compact('anakList'));
    }

    /**
     * Menampilkan dashboard mentor dengan jumlah anak.
     */
    public function dashboard()
    {
        $mentor = Auth::guard('mentor')->user();
        $jumlahAnak = $mentor->anak()->count();

        return view('mentor.dashboard', compact('jumlahAnak'));
    }

    /**
     * Menampilkan halaman akun (ubah password).
     */
    public function akun()
    {
        $mentor = Auth::guard('mentor')->user();
        return view('mentor.akun', compact('mentor'));
    }

    /**
     * Proses ubah password TANPA hash (untuk keperluan testing).
     */
    public function ubahPassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|string|min:6|confirmed',
        ]);

        $mentor = Auth::guard('mentor')->user();

        // Validasi password lama secara plain text (tidak pakai Hash)
        if ($request->password_lama !== $mentor->password) {
            return back()->withErrors(['password_lama' => 'Password lama tidak sesuai'])->withInput();
        }

        // Simpan password baru tanpa hashing
        $mentor->password = $request->password_baru;
        $mentor->save();

        return redirect()->route('mentor.akun')->with('success', 'Password berhasil diubah.');
    }
}
