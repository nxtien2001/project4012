<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getLoginForm()
    {
        return view('auth.loginForm');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->only([
            'email',
            'password',
        ]);

        /*
         * Auth::attempt(['email', 'password'])
         * return false nếu login thất bại
         * return true nếu login thành công
         */
        $result = Auth::attempt($data);

        if ($result === false) {
            session()->flash('error', 'Sai email hoặc mật khẩu');
            return back();
        }

        $user = Auth::user();

        return redirect()->route('admin.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
