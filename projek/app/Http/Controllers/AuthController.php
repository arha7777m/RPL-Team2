<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {

        if(Auth::attempt($request->only('email','password')))
        {
            return redirect('/matkul');
        }
        return redirect('/')->with('error','Email/Password tidak sesuai');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registrasi(){
        return view('auth.registrasi');
    }

    public function postregistrasi(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);
        return redirect('/')->with('sukses','Registrasi berhasil, silahkan login!');
    }

}
