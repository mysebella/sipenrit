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
    public function index(Request $request)
    {
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

        $path = 'public/document/';

        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        $fileUploaded = [];
        $userName = User::select('name')->where('nrp', Cookie::get('uix'))->first();

        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $requestFile = $request->file($file);

                // Validasi file
                $request->validate([
                    $file => 'mimes:jpg,jpeg,png|max:2048',
                ]);

                Log::info('Uploading file: ' . $requestFile->getClientOriginalName());

                $filename = str_replace(' ', '-', $file . '-' . strtolower($userName['name']) . '-' . Cookie::get('uix') . '.' . $requestFile->extension());
                $requestFile->storeAs($path, $filename);

                Log::info('Stored file as: ' . $filename);

                $fileUploaded[$file] = $filename;
            }
        }

        Document::where('user_id', Cookie::get('id'))->update(['telephone_btn' => $request->telephone_btn, 'rekening_btn' => $request->rekening_btn]);

        foreach ($fileUploaded as $key => $value) {
            Document::where('user_id', Cookie::get('id'))->update([$key => $value]);
        }

        User::where('id', Cookie::get('id'))->update(['active' => 'active']);
    }

    public function update(Request $request, $document)
    {
        $path = 'public/document/';

        if ($request->hasFile($document)) {
            $file = $request->file($document);

            $request->validate([
                $document => 'mimes:jpg,jpeg,png|max:2048',
            ]);

            Log::info('Uploading file: ' . $file->getClientOriginalName());

            $userName = User::select('name')->where('nrp', Cookie::get('uix'))->first();

            $filename = str_replace(' ', '-', $document . '-' . strtolower($userName['name']) . '-' . Cookie::get('uix') . '.' . $file->extension());
            $file->storeAs($path, $filename);

            Log::info('Stored file as: ' . $filename);
            Document::where('user_id', Cookie::get('id'))->update([$document => $filename]);
            Document::where('user_id', Cookie::get('id'))->update(['telephone_btn' => $request->telephone_btn, 'rekening_btn' => $request->rekening_btn]);
        }
    }
}
