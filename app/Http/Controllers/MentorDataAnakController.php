<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MentorDataAnakController extends Controller
{
    // Tampilkan daftar anak milik mentor
    public function index()
    {
        $anakList = Anak::where('mentor_id', Auth::id())->get();
        return view('mentor.data_anak', compact('anakList'));
    }

    // Tampilkan form tambah anak
    public function create()
    {
        return view('mentor.create');
    }

    // Simpan data anak baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_induk' => 'required|string|unique:data_anak,nomor_induk',
            'password' => 'required|string|min:6',
        ]);

        Anak::create([
            'nama' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'password' => Hash::make($request->password), // Hash password
            'mentor_id' => Auth::id(),
        ]);

        return redirect()->route('mentor.data_anak')->with('success', 'Anak berhasil ditambahkan.');
    }

    // Tampilkan form edit anak
    public function edit($id)
    {
        $anak = Anak::findOrFail($id);

        // Pastikan hanya mentor yang berwenang yang bisa mengedit
        if ($anak->mentor_id !== Auth::id()) {
            abort(403);
        }

        return view('mentor.edit', compact('anak'));
    }

    // Update data anak
    public function update(Request $request, $id)
    {
        $anak = Anak::findOrFail($id);

        if ($anak->mentor_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_induk' => 'required|string|unique:data_anak,nomor_induk,' . $anak->id,

            'password' => 'nullable|string|min:6',
        ]);

        $anak->nama = $request->nama;
        $anak->nomor_induk = $request->nomor_induk;

        if ($request->filled('password')) {
            $anak->password = Hash::make($request->password); // Hash password
        }

        $anak->save();

        return redirect()->route('mentor.data_anak')->with('success', 'Data anak berhasil diperbarui.');
    }

    // Hapus data anak
    public function destroy($id)
    {
        $anak = Anak::findOrFail($id);

        if ($anak->mentor_id !== Auth::id()) {
            abort(403);
        }

        $anak->delete();

        return redirect()->route('mentor.data_anak')->with('success', 'Data anak berhasil dihapus.');
    }
}
