<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    // Menampilkan halaman upload dan menangani proses upload
    public function index(Request $request)
    {
        // Daftar nama-nama file yang diizinkan untuk diupload
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
            'telephone_btn',
            'rekening_btn',
            'pasphoto_berwarna_suami',
            'pasphoto_berwarna_istri',
        ];

        // Menentukan path penyimpanan file
        $path = 'public/document/';

        // Membuat direktori jika belum ada
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        // Menyimpan nama-nama file yang diupload
        $fileUploaded = [];

        // Mengambil nama pengguna dari cookie
        $userName = User::select('name')->where('nrp', Cookie::get('uix'))->first();

        // Iterasi setiap nama file untuk proses upload
        foreach ($files as $file) {
            // Mengecek jika file ada di dalam request
            if ($request->hasFile($file)) {
                $requestFile = $request->file($file);

                // Validasi file yang diupload
                $request->validate([
                    $file => 'mimes:jpg,jpeg,png',
                ]);

                // Mencatat informasi file yang diupload
                Log::info('Mengupload file: ' . $requestFile->getClientOriginalName());

                // Membuat nama file yang unik
                $filename = str_replace(' ', '-', $file . '-' . strtolower($userName['name']) . '-' . Cookie::get('uix') . '.' . $requestFile->extension());
                $requestFile->storeAs($path, $filename);

                // Mencatat informasi nama file yang disimpan
                Log::info('Menyimpan file sebagai: ' . $filename);

                // Menyimpan nama file ke dalam array
                $fileUploaded[$file] = $filename;
            }
        }

        // Memperbarui informasi dokumen di database untuk pengguna
        Document::where('user_id', Cookie::get('id'))->update(['telephone_btn' => $request->telephone_btn, 'rekening_btn' => $request->rekening_btn]);

        // Memperbarui informasi dokumen yang diupload di database
        foreach ($fileUploaded as $key => $value) {
            Document::where('user_id', Cookie::get('id'))->update([$key => $value]);
        }

        // Mengubah status pengguna menjadi aktif
        User::where('id', Cookie::get('id'))->update(['active' => 'active']);
    }

    // Mengupdate dokumen yang sudah diupload
    public function update(Request $request, $document)
    {
        // Menentukan path penyimpanan file
        $path = 'public/document/';

        // Mengecek jika file ada di dalam request
        if ($request->hasFile($document)) {
            $file = $request->file($document);

            // Validasi file yang diupload
            $request->validate([
                $document => 'mimes:jpg,jpeg,png|max:2048',
            ]);

            // Mencatat informasi file yang diupload
            Log::info('Mengupload file: ' . $file->getClientOriginalName());

            // Mengambil nama pengguna dari cookie
            $userName = User::select('name')->where('nrp', Cookie::get('uix'))->first();

            // Membuat nama file yang unik
            $filename = str_replace(' ', '-', $document . '-' . strtolower($userName['name']) . '-' . Cookie::get('uix') . '.' . $file->extension());
            $file->storeAs($path, $filename);

            // Mencatat informasi nama file yang disimpan
            Log::info('Menyimpan file sebagai: ' . $filename);

            // Memperbarui informasi dokumen di database
            Document::where('user_id', Cookie::get('id'))->update([$document => $filename]);

            // Memperbarui informasi telephone_btn dan rekening_btn di database
            Document::where('user_id', Cookie::get('id'))->update(['telephone_btn' => $request->telephone_btn, 'rekening_btn' => $request->rekening_btn]);
        }
    }
}
