<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() 
    {
        return view('auth.login');
    }

    public function login() 
    {
        
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
    
            $guestRole = Role::where('name', 'Guest')->first();         
            $user->assignRole($guestRole);
    
            return redirect()->route('auth')->with('success', 'Registrasi Berhasil.');
        } catch (Exception $e) {
            Log::error($e->getMessage());        
            return redirect()->back()->with('error', 'Registrasi Gagal!' .  $e->getMessage());
        }
    }
}
