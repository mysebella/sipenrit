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
        if ($user = $this->isUserExist('nrp', $request->nrp)) {
            return redirect(route('home'))
                ->with('success', 'Berhasil Masuk')
                ->withCookies([Cookie::make('uix', $request->nrp), Cookie::make('id', $user->id)]);
        } else {
            return back()->with('error', 'Anda Belum terdaftar, silahkan daftar terlebih dahulu');
        }
    }

    public function register(Request $request)
    {

        if (!$this->isUserExist('nrp', $request->nrp)) {

            $file = $request->file('profile');
            $filename = 'profile-' . strtolower(str_replace(' ', '-', $request->name)) . '.' . $file->extension();
            $file->storeAs('public/profile', $filename);

            $request['birth'] = "$request->day $request->month $request->year";
            $request['pension'] = "$request->day $request->month " . Pension::date($request->year, $request->rank);

            $user = User::create($request->all());
            User::where('id', $user->id)->update(['profile' => $filename]);

            Document::create(['user_id' => $user->id]);

            if ($user) {
                return redirect(route('login.view'))->with('success', 'Pendaftaran Berhasil');
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
