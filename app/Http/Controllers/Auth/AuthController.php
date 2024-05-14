<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('apps.dashboard');
        } else {
            return redirect()->route('auth');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registration(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $guestRole = Role::findByName('Guest');
            $user->assignRole($guestRole);

            return redirect()->route('auth');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }
}
