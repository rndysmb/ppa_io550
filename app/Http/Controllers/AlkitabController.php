<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlkitabController extends Controller
{
    public function bacaPasal($abbr, $pasal)
    {
        // Ambil data dari storage
        $json = Storage::get('alkitab.json');
        $semuaAyat = json_decode($json, true);

        // Filter ayat berdasarkan kitab dan pasal
        $filtered = array_filter($semuaAyat, function ($ayat) use ($abbr, $pasal) {
            return strtolower($ayat['abbr']) === strtolower($abbr) &&
                   $ayat['chapter'] == $pasal;
        });

        // Jika tidak ditemukan
        if (empty($filtered)) {
            return response()->json(['error' => 'Pasal tidak ditemukan'], 404);
        }

        // Format hasil
        $hasil = [];
        foreach ($filtered as $ayat) {
            $hasil[$ayat['verse']] = strip_tags($ayat['text']); // hapus <t /> jika ada
        }

        return response()->json([
            'kitab' => strtoupper($abbr),
            'pasal' => $pasal,
            'ayat' => $hasil
        ]);
    }
}
