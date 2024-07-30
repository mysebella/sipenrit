<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadController;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

Route::prefix("auth")
    ->controller(AuthController::class)
    ->group(function () {
        Route::view("login", "auth.login")->name("login.view");
        Route::view("register", "auth.register")->name("register.view");

        Route::get('logout', function () {
            return redirect(route('login.view'))->withCookies([Cookie::forget('uix'), Cookie::forget('id')]);
        })->name('logout');

        Route::post("login", "login")->name('login');
        Route::post("register", "register")->name('register');
    });

Route::middleware(['isUserAuth'])->get("/", function () {
    $user = User::where('nrp', Cookie::get('uix'))->first();
    return view('home', ['user' => $user]);
})->name('home');


Route::middleware(['isUserAuth'])->prefix('upload')->controller(UploadController::class)->group(function () {
    Route::get('', function () {
        $files = [
            'dcpp',
            'permohonan',
            'foto_inpasing',
            'foto_kep_kp_akhir',
            'foto_kep_mpp',
            'foto_kartu_asabri',
            'foto_kpi',
            'foto_ku_107',
            'foto_surat_nikah',
            'foto_kk',
            'foto_ktp',
            'foto_surat_kelahiran',
            'surat_keterangan_kuliah_anak',
            'ku_i',
            'foto_tanda_jasa',
            'foto_kartu_npwp',
            'foto_rekening_buku_tabungan_btn',
            'pasphoto_berwarna_suami',
            'pasphoto_berwarna_istri',
        ];
        return view('upload', ['document' => Document::where('user_id', Cookie::get('id'))->first(), "ii" => $files]);
    })->name('upload');

    Route::get('{document}', function ($document) {
        return view('upload-one-document', [
            "document" => $document
        ]);
    })->name('update.document');

    Route::post('update/{document}', 'update')->name('upload.update');
    Route::post('store', 'index')->name('upload.post');
});

Route::middleware(['isAdmin'])->prefix('dashboard')->controller(DashboardController::class)->group(function () {
    Route::get('', 'index')->name('dashboard');
    Route::get('show/{nrp}', 'show')->name('dashboard.show');
});

Route::get('link', function () {
    $target = storage_path('/app/public/');
    $symlink = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($target, $symlink);
});
