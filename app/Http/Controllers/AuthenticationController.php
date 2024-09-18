<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index (){
        return view('login');
    }
    public function create(){
        return view('register');
    }
    public function store(Request $request){

        $request->validate([
            'uname' => 'required|String|max:100|unique:users,Username',
            'passw' => 'required|String|min:6|max:100'
        ]);

        $hashedPassword = hash('sha256', md5($request->passw));

        $user = new User();
        $user->insert_user($request->uname, $hashedPassword);

        return redirect('/login')->with('status', 'Berhasil Regristrasi');
    }
    public function login(Request $request){

        $request->validate([
            'uname' => 'required|String',
            'passw' => 'required|String'
        ]);

        $user = new User();
        $result = $user->get_user_by_uname($request->uname);

        if (!empty($result)) {
            $storedPassword = $result[0]->Password;
            if ($storedPassword === hash('sha256', md5($request->passw))) {
                return  redirect('/dashboard')->with('status', 'Berhasil login');
            }
        }

        return redirect('/login')->with('status', 'Username atau Password salah');
    }
}
