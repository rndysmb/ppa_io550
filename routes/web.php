<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MentorDataAnakController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\BacaanController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TugasController;

// ====================
// Login & Logout Umum
// ====================

Route::get('/', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/anak/logout', [AuthController::class, 'logout'])->name('anak.logout');

// ====================
// Tes Halaman Sederhana
// ====================
Route::get('/tes', function () {
    return view('auth.welcome');
});

// ====================
// MENTOR ROUTES
// ====================
Route::middleware(['auth:mentor'])->prefix('mentor')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        $mentor = Auth::guard('mentor')->user();
        $jumlahAnak = $mentor->anak()->count();
        return view('mentor.dashboard', compact('jumlahAnak'));
    })->name('mentor.dashboard');

    // Data Anak (CRUD)
    Route::get('/data-anak', [MentorDataAnakController::class, 'index'])->name('mentor.data_anak');
    Route::get('/data-anak/create', [MentorDataAnakController::class, 'create'])->name('mentor.data_anak.create');
    Route::post('/data-anak', [MentorDataAnakController::class, 'store'])->name('mentor.data_anak.store');
    Route::get('/data-anak/{id}/edit', [MentorDataAnakController::class, 'edit'])->name('mentor.data_anak.edit');
    Route::put('/data-anak/{id}', [MentorDataAnakController::class, 'update'])->name('mentor.data_anak.update');
    Route::delete('/data-anak/{id}', [MentorDataAnakController::class, 'destroy'])->name('mentor.data_anak.destroy');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('mentor.laporan');

    // Akun dan Ganti Password
    Route::get('/akun', [MentorController::class, 'akun'])->name('mentor.akun');
    Route::post('/akun/ubah-password', [MentorController::class, 'ubahPassword'])->name('mentor.password.update');

    // ====================
    // CRUD Tugas (Mentor)
    // ====================
    Route::get('/tugas', [TugasController::class, 'indexMentor'])->name('mentor.tugas.index');
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('mentor.tugas.create');
    Route::post('/tugas', [TugasController::class, 'store'])->name('mentor.tugas.store');
    Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('mentor.tugas.edit');
    Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('mentor.tugas.update');
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('mentor.tugas.destroy');
    Route::get('/tugas/{id}/pengumpulan', [TugasController::class, 'lihatPengumpulan'])->name('mentor.tugas.pengumpulan');
});

// ====================
// ANAK ROUTES
// ====================
Route::middleware(['auth:anak'])->prefix('anak')->group(function () {

    // Dashboard Anak
    Route::get('/dashboard', function () {
        return view('anak.dashboard');
    })->name('anak.dashboard');

    // Ayat Favorit dan Video
    Route::get('/ayat-favorit', function () {
        return view('anak.ayat');
    })->name('anak.ayat');

    Route::get('/video', function () {
        return view('anak.video');
    })->name('anak.video');

    // Bacaan Alkitab
    Route::get('/baca', [BacaanController::class, 'index'])->name('anak.baca');
    Route::post('/baca/simpan-progres', [BacaanController::class, 'simpanProgres'])->name('anak.baca.simpan');
    Route::get('/kitab/{kitab}', [BacaanController::class, 'tampilSeluruhKitab'])->name('anak.kitab');
    Route::get('/kitab/{kitab}/{pasal}', [BacaanController::class, 'showPasal'])->name('anak.pasal');

    // ====================
    // Tugas (Anak)
    // ====================
    Route::get('/tugas', [TugasController::class, 'indexAnak'])->name('anak.tugas.index');
    Route::get('/tugas/{id}/kumpul', [TugasController::class, 'formKumpul'])->name('anak.tugas.kumpul');
    Route::post('/tugas/{id}/kumpul', [TugasController::class, 'kumpulkan'])->name('anak.tugas.submit');
});

// ====================
// Tes Load JSON Alkitab
// ====================
Route::get('/tes-json', function () {
    $start = microtime(true);
    $json = file_get_contents(storage_path('app/alkitab/alkitab.json'));
    $data = json_decode($json, true);
    $duration = microtime(true) - $start;

    return "Waktu load dan decode JSON: " . round($duration, 3) . " detik. Jumlah ayat: " . count($data);
});

// ====================
// Fallback Route (Optional)
// ====================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
