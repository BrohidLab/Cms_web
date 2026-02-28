<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('pages.admin.auth.login');
    }

    public function register(Request $request)
    {        
        $user = User::create([
            'name'=> 'Suzuki Auto Zone',
            'email'=> 'suzukiautozone@gmail.com',
            'password'=>Hash::make('Suzuki123@')
        ]);

        Auth::login($user);

        return redirect('user-admin/dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials,$request->remember)){
            return redirect()->intended('user-admin/dashboard');
        }

        return back()->withErrors(['email'=>'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('user-admin');
    }
}
