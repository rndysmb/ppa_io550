<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\PengumpulanTugas;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    // ====================== MENTOR ======================

    // Mentor melihat semua tugas yang ia buat
    public function indexMentor()
    {
        $mentorId = Auth::guard('mentor')->id();
        $tugas = Tugas::where('mentor_id', $mentorId)->orderByDesc('created_at')->get();

        return view('mentor.tugas.index', compact('tugas'));
    }

    // Form tambah tugas
    public function create()
    {
        return view('mentor.tugas.create');
    }

    // Simpan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_waktu' => 'nullable|date',
        ]);

        Tugas::create([
            'mentor_id' => Auth::guard('mentor')->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu,
        ]);

        return redirect()->route('mentor.tugas.index')->with('success', 'Tugas berhasil dibuat.');
    }

    // Form edit tugas
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);

        // Pastikan hanya mentor yang membuat tugas ini yang bisa mengedit
        if ($tugas->mentor_id !== Auth::guard('mentor')->id()) {
            abort(403);
        }

        return view('mentor.tugas.create', compact('tugas')); // Pakai view yang sama
    }

    // Update tugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_waktu' => 'nullable|date',
        ]);

        $tugas = Tugas::findOrFail($id);

        if ($tugas->mentor_id !== Auth::guard('mentor')->id()) {
            abort(403);
        }

        $tugas->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu,
        ]);

        return redirect()->route('mentor.tugas.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    // Hapus tugas
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);

        if ($tugas->mentor_id !== Auth::guard('mentor')->id()) {
            abort(403);
        }

        $tugas->delete();

        return redirect()->route('mentor.tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }

    // Melihat pengumpulan tugas anak-anak
    public function lihatPengumpulan($id)
    {
        $tugas = Tugas::with(['pengumpulan.anak'])->findOrFail($id);

        if ($tugas->mentor_id !== Auth::guard('mentor')->id()) {
            abort(403);
        }

        return view('mentor.tugas.pengumpulan', compact('tugas'));
    }

    // ====================== ANAK ======================

    // Anak melihat semua tugas
public function indexAnak()
{
    $anakId = Auth::guard('anak')->id();

    // Ambil semua tugas
    $tugas = Tugas::latest()->get();

    // Ambil tugas yang sudah dikumpulkan oleh anak ini
    $tugasDikumpulkan = PengumpulanTugas::where('anak_id', $anakId)
                            ->pluck('tugas_id') // ambil hanya id tugas
                            ->toArray(); // ubah jadi array biasa untuk mudah dicek

    return view('anak.tugas.index', compact('tugas', 'tugasDikumpulkan'));
}
    // Form anak mengumpulkan tugas
    public function formKumpul($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('anak.tugas.kumpul', compact('tugas'));
    }

    // Anak submit tugas
    public function kumpulkan(Request $request, $id)
    {
        $anakId = Auth::guard('anak')->id();

        // Cek apakah anak sudah mengumpulkan tugas ini
        $sudahKumpul = PengumpulanTugas::where('anak_id', $anakId)
                        ->where('tugas_id', $id)
                        ->exists();

        if ($sudahKumpul) {
            return redirect()->back()->with('error', 'Kamu sudah mengumpulkan tugas ini.');
        }

        $request->validate([
            'jawaban_teks' => 'nullable|string',
            'file_jawaban' => 'nullable|file|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file_jawaban')) {
            $filePath = $request->file('file_jawaban')->store('jawaban', 'public');
        }

        PengumpulanTugas::create([
            'tugas_id' => $id,
            'anak_id' => $anakId,
            'jawaban_teks' => $request->jawaban_teks,
            'file_jawaban' => $filePath,
        ]);

        return redirect()->route('anak.tugas.index')->with('success', "Tugas berhasil dikumpulkan.");
    }
}