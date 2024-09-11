<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index (){
        return view('login');
    }
    public function store(Request $request){

        $request->validate([
            'uname' => 'required|String|max:100|unique:user,Username',
            'passw' => 'required|String|max:100|unique:user,Password'
        ]);

        $hashpass = hash('sha256', md5($request->passw));

        $user = new User();
        $user->insert_user($request->uname, $hashpass);

        return redirect('/login')->with('Status', 'Berhasil Melakukan Register');
    }
    public function login(Request $request){

        $request->validate([
            'uname' => 'required|String',
            'passw' => 'required|String'
        ]);

        $user = new User();
        $user->get_user_by_uname($request->uname);

        if ($user && $user->password === hash('sha256', md5($request->passw))) {
            return redirect('/dashboard')->with('Status', 'Berhasil Login');
        }

        return back()->with('Status', 'Gagal Login');
    }
}
