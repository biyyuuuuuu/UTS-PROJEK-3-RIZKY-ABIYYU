<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('login/register');
    }

    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'username' => ['required', 'string', 'max:255', 'unique:users'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => md5($request->password), // Menggunakan MD5 untuk password
        ]);


        // event(new Registered($user));

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
