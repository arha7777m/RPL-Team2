<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('profilsaya', compact('user'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required',
            'jurusan' => 'required'
        ]);
        
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->jurusan = $request->jurusan;

        if($request->email != $user->email)
        {
            $this->validate($request, [
                'email' => 'required|email|unique:users'
            ]);
            $user->email = $request->email;
        }
        if(!empty($request->password))
        {
            $this->validate($request, [
                'password' => 'min:6'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->update();
        return redirect('profilsaya')->with('sukses', 'Data profil berhasil diubah');
    }
}
