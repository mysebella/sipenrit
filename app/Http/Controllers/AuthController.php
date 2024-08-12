<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tools\Pension;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // di check apakah user yang masuk sudah pernah daftar atau blm dan apakah yang di nrp masukan benar atau tidak
        if ($user = $this->isUserExist('nrp', $request->nrp)) {
            // jika sudah berarti akan masuk helaman utama
            return redirect(route('home'))
                ->with('success', 'Berhasil Masuk')
                ->withCookies([Cookie::make('uix', $request->nrp), Cookie::make('id', $user->id)]);
        } else {
            // jika blm terdaftar maka akan menampilkan pesan blm terdaftar
            return back()->with('error', 'Anda Belum terdaftar, silahkan daftar terlebih dahulu');
        }
    }

    public function register(Request $request)
    {
        // ecek apakah user sudah pernah daftar atau belum
        if (!$this->isUserExist('nrp', $request->nrp)) {
            // jika blm pernah makan ambil data yang di masukan user

            $filename = "default.jpg";

            if ($request->hasFile('profile')) {
                // kita ambil photonya dan simpan photo yang sudah di masukan user
                $file = $request->file('profile');
                $filename = 'profile-' . strtolower(str_replace(' ', '-', $request->name)) . '.' . $file->extension();
                $file->storeAs('public/profile', $filename);
            }

            // kita convert tahun yang dimasukan user menjadi tanggal lahir dan tahun pensiun
            $request['birth'] = "$request->day $request->month $request->year"; // 18 mei 2005, 18 mei 2005
            $request['pension'] = "$request->day $request->month " . Pension::date($request->year, $request->rank);

            // setelah data sudah disiapkan dengan benar makan langsung simpan user ke databse
            $user = User::create($request->all());
            User::where('id', $user->id)->update(['profile' => $filename]);

            // buat halaman document kosong
            Document::create(['user_id' => $user->id]);

            // jika user berhasil disimpan maka arahkan user ke halaman utama
            if ($user) {
                return redirect(route('home'))
                    ->with('success', 'Pendaftaran Berhasil')
                    ->withCookies([Cookie::make('uix', $request->nrp), Cookie::make('id', $user->id)]);;
            }
        } else {
            return back()->with('error', 'Account Sudah Terdaftar');
        }
    }


    public function isUserExist($column, $nrp)
    {
        $exist = User::where($column, $nrp)->first();
        return $exist;
    }
}
