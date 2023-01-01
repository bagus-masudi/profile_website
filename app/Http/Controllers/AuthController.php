<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function login(){
        if(Auth::user()){
            return redirect()->route('profile');
        } else {
            $error['error'] = '';
            return view('login', [
                'error' => $error
            ]);
        }
    }

    public function register() {
        if(Auth::user()){
            return redirect()->route('profile');
        } else {
            $error['error'] = '';
            return view('register', [
                'error' => $error
            ]);
        }
    }

    public function registerStore(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data['password'] = bcrypt($data['password']);

        
        try {
            User::create($data);
            return redirect()->route('login');
        } catch (Exception $e){
            $error['error'] = 'error';
            return view('register', [
            'error' => $error
        ]);
        }
    }

    public function loginStore(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();

            return redirect()->route('profile');
        }

        $error['error'] = 'error';
        return view('login', [
            'error' => $error
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
