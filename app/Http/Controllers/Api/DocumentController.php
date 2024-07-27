<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;

class DocumentController extends Controller
{
    public function get($id)
    {
        // Ambil data dokumen bersama relasi user
        $document = Document::with('user')->where('user_id', $id)->first();

        $nonNullColumns = [];

        if ($document) {
            // Dapatkan atribut model sebagai array
            $attributes = $document->getAttributes();

            foreach ($attributes as $key => $value) {
                if (!is_null($value)) {
                    // Tambahkan kolom yang tidak null ke array hasil
                    $nonNullColumns[$key] = $value;
                }
            }

            // Sertakan data user
            if ($document->user) {
                $nonNullColumns['user'] = $document->user; // Anda dapat memilih atribut yang ingin disertakan
            }
        }

        return response()->json([
            'data' => $nonNullColumns
        ]);
    }
}
