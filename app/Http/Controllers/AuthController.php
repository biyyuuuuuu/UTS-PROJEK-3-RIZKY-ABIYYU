<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function register()
    {
        return view('auth/register');
    }
    public function registerSave(Request $request)

    {
    Validator::make(request()->all(), [
        'name' =>'required',
        'email' =>'required|email',
        'password' => 'required|password',
    ])->validate();

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'level' => 'admin'
    ]);
    return redirect()->route('login');
}
}
