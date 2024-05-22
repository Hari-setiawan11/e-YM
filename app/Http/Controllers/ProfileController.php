<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id(); // Mendapatkan user_id dari pengguna yang sedang login
        $user = User::findOrFail($user_id); // Mencari pengguna berdasarkan user_id

        // Menyiapkan data pengguna untuk ditampilkan di halaman
        $data = [
            'user' => $user,
        ];

        // Mengirim data ke view
        return view('page.manajemen_profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user_id = Auth::id(); // Mendapatkan user_id dari pengguna yang sedang login
        $user = User::findOrFail($user_id); // Mencari pengguna berdasarkan user_id

        // Memvalidasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'alamat' => 'nullable|string',
            'telephone' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Memperbarui data pengguna dengan data yang diterima dari form
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->alamat = $request->alamat;
        $user->telephone = $request->telephone;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
