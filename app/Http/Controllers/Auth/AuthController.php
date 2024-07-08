<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        $title = 'login';
        return view('auth.login.index', compact(['title']));
    }


    public function store(Request $request)
    {
        $request->validate([
            'email'         => 'required|email|min:2',
            'password'   => 'required|min:2',
        ], [
            'email.required' => 'Email harus diisi',
            'email.min' => 'Email minimal 2 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 2 karakter',
        ]);
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credetials)) {
            return redirect('/dashboard')->with('success', 'Login berhasil');
        }
        return back()->with('error', 'Email or Password salah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
