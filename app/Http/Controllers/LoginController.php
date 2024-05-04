<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) { 
            // dd("User authenticated!"); 
            return redirect()->route('admin.dashboard');
        } else { 
            return redirect()->route('login')->with('gagal', 'Email atau Password yang anda gunakan salah !');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('sukses', 'Anda berhasil logout !');
    }
}
