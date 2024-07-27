<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tools\Pension;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'users' => $this->getAllPersonel(),
            'path' => 'dashboard'
        ]);
    }

    public function show($nrp)
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
            'pasphoto_berwarna_suami',
            'pasphoto_berwarna_istri',
        ];

        return view('dashboard.index', [
            'ii' => $files,
            'user' => User::with('document')->where('nrp', $nrp)->first(),
            'users' => $this->getAllPersonel(),
            'path' => 'show'
        ]);
    }

    private function getAllPersonel()
    {
        $users = [];

        foreach (User::where('role', '!=', 'admin')->get() as $user) {
            $users[] = $user;
        }

        return $users;
    }
}
