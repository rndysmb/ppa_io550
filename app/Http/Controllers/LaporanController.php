<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anak;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil hanya anak-anak yang berada di bawah mentor yang sedang login
        $mentorId = auth()->guard('mentor')->user()->id;

        // Ambil anak dan progres terakhir mereka
        $anakList = Anak::with('progresTerakhir')
            ->where('mentor_id', $mentorId)
            ->get();

        return view('mentor.laporan', compact('anakList'));
    }
}
