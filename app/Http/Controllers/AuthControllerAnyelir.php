<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AuthControllerAnyelir extends Controller
{
    public function showLogin()
    {
        return view('login_anyelir');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('t_user_anyelir')->where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            session([
                'is_logged_in' => true,
                'username' => $user->username,
                'nama_lengkap' => $user->nama_lengkap
            ]);
            return redirect('/siswa');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}