<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('pages.login');
    }

    public function makeLogin(Request $request)
    {
        $data = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('publications.list');
        } else {
            return back()->withErrors([
                'Las credenciales no corresponden a nuestros registros.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
