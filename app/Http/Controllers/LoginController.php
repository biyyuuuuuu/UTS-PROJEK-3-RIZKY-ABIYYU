<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login/login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required'],
    ]);

    $user = User::where('username', $credentials['username'])->first();

    if ($user && $user->password === md5($credentials['password'])) {
        Auth::login($user);

        $request->session()->regenerate();

        return redirect('home');
    }

    throw ValidationException::withMessages([
        'username' => [trans('auth.failed')],
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
