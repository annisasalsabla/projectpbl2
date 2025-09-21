<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user(); // ambil user yang sudah login

        // kalau belum login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login dulu!');
        }

        // kalau bukan admin
        if ($user->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Anda tidak punya akses!');
        }

        return view('admin.dashboard', compact('user'));
    }
}
