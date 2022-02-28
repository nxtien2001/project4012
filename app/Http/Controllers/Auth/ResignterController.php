<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class ResignterController extends Controller
{
    public function getResign()
    {
        return view('auth.register');
    }
    public function postResign(RegisterRequest $request)
    {
        $user = new User();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => $request->password,
            'role_id' => 1
        ]);
        $user->save();
        if ($user->id) {
            return redirect()->route('login')->with('success', 'Đăng kí tài khoản thành công! Vui lòng đăng nhập');
        }
        return redirect()->back();
    }
}
