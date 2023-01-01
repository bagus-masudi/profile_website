<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index() {
        $user = User::All()->where('id', Auth::id());
        return view('profile', [
            'user' => $user 
        ]);
    }

    public function update(Request $request, User $user) {
        try {
            $user = User::findOrFail(Auth::id());

            if ($request->hasfile('photo')) {         
                $current = public_path('images/photo/' . $user->photo);
                File::delete($current);   
                $request->photo = $request->file('photo')->getClientOriginalName();
                $request->file('photo')->move(public_path('images/photo'), $request->photo);
                $user->photo = $request->photo;
            }

            $user->name = $request->name;
            $user->username = $request->username;
            $user->pekerjaan = $request->pekerjaan;
            $user->no_hp = $request->no_hp;
            $user->tgl_lhr = $request->tgl_lhr;
            $user->alamat = $request->alamat;
            $user->email = $request->email;

            $user->save();

            //$users = User::All()->where('id', Auth::id());
            // $error['success'] = 'Profile Succesfully Edited';
            // return view('profile', [
            //     'error' => $error,
            //     'user' => $users
            // ]);
            return redirect()->route('profile');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::id());
            $current = public_path('images/photo/' . $user->photo);
            File::delete($current);  
            $user->delete();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        } catch (\Exception $e) {
            return redirect()->route('profile');
        }
    }
}
