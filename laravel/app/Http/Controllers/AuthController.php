<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password // KHÔNG có bcrypt
        ]);

        return redirect()->back()->with('success', 'Đăng ký thành công');
    }
    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required|min:6',]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return back()->withErrors(['email' => 'Sai tài khoản hoặc mật khẩu']);
    }
}
