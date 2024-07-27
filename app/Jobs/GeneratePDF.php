<?php

namespace App\Jobs;

use App\Models\Document;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeneratePDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $files = [
            'dcpp',
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

        $document = Document::with('user')->where('user_id', $this->userId)->first();

        $pdf = Pdf::loadView('pdf.view', ['document' => $document, 'files' => $files]);
        $pdf->save(storage_path('app/public/pdf/' . $document->user->name . '.pdf'));
    }
}
