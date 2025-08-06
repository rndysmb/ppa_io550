<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\ProgresBacaan;
use Illuminate\Support\Facades\Storage;


class BacaanController extends Controller
{
    // Tampilkan bacaan terakhir anak atau berdasarkan kitab & pasal tertentu
    public function index(Request $request)
{
    $anak = Auth::guard('anak')->user();

    // Ambil progres terakhir anak dari database
    $progresTerakhir = ProgresBacaan::where('anak_id', $anak->id)
        ->latest('updated_at')
        ->first();

    $kitabAbbr = $request->input('kitab', $progresTerakhir->kitab ?? 'Kejadian');
    $pasal = (int) $request->input('pasal', $progresTerakhir->pasal ?? 1);

    // Baca file JSON lokal
    $json = file_get_contents(storage_path('app/alkitab/alkitab.json'));
    $data = json_decode($json, true);

    if (!$data || !is_array($data)) {
        return abort(500, 'File JSON rusak atau tidak ditemukan.');
    }

    // Filter berdasarkan `abbr` dan `chapter`
    $isiPasal = collect($data)->filter(function ($item) use ($kitabAbbr, $pasal) {
        return $item['abbr'] === $kitabAbbr && (int)$item['chapter'] === $pasal;
    })->values();

    if ($isiPasal->isEmpty()) {
        return abort(404, 'Kitab atau pasal tidak ditemukan.');
    }

    return view('anak.baca', [
        'kitab' => $kitabAbbr,
        'pasal' => $pasal,
        'isi' => $isiPasal->map(function ($ayat) {
            return [
                'verse' => $ayat['verse'],
                'text' => $ayat['text'],
                'title' => $ayat['title'] ?? null,
            ];
        }),
    ]);
}

    // Simpan progres terakhir anak
    public function simpanProgres(Request $request)
    {
        $request->validate([
            'kitab' => 'required|string',
            'pasal' => 'required|integer',
        ]);

        $anak = Auth::guard('anak')->user();

        ProgresBacaan::updateOrCreate(
            ['anak_id' => $anak->id],
            [
                'kitab' => $request->kitab,
                'pasal' => (int) $request->pasal,
            ]
        );

        return redirect()->back()->with('success', 'Progres berhasil disimpan!');
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////


public function tampilSeluruhKitab($kitabAbbr)
{
    $json = file_get_contents(storage_path('app/alkitab/alkitab.json'));
    $data = json_decode($json, true);

    if (!$data || !is_array($data)) {
        return view('anak.kitab', [
            'kitab' => strtoupper($kitabAbbr),
            'isiKitab' => collect(),
            'pesan' => 'File JSON tidak valid atau kosong.'
        ]);
    }

    $filtered = collect($data)->filter(function ($item) use ($kitabAbbr) {
        return strtoupper($item['abbr']) === strtoupper($kitabAbbr);
    });

    if ($filtered->isEmpty()) {
        return view('anak.kitab', [
            'kitab' => strtoupper($kitabAbbr),
            'isiKitab' => collect(),
            'pesan' => 'Kitab tidak ditemukan atau kosong.'
        ]);
    }

    $isiKitab = $filtered->groupBy('chapter');

    return view('anak.kitab', [
        'kitab' => strtoupper($kitabAbbr),
        'isiKitab' => $isiKitab
    ]);
}

}
