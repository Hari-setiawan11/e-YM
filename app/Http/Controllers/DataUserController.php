<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil peran "guest"
        $guestRole = Role::where('name', 'guest')->first();

        // Jika peran "guest" tidak ditemukan, kembalikan tampilan kosong
        if (!$guestRole) {
            return view('page.manajemen_data_user.index', ['users' => []]);
        }

        // Mengambil semua pengguna yang memiliki peran "guest"
        $users = $guestRole->users;

        // Menyiapkan data untuk dikirim ke tampilan
        $data = [
            'users' => $users,
        ];

        // Mengirim data ke tampilan
        return view('page.manajemen_data_user.index', $data);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('index.view.datauser')->with('toast_success', 'Data Barang Berhasil Dihapus');
    }
}
