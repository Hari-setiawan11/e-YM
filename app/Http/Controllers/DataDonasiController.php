<?php

namespace App\Http\Controllers;

use App\Models\DataDonasi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DataDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $data['dataDonasi']=DataDonasi::all();
    //     return view('page.manajemen_data_donasi.index', $data);
    // }
     public function index()
{
    // Mengambil semua data pengguna (User)
    $users = User::all();

    // Mengambil semua data donasi beserta relasi user
    $dataDonasi = DataDonasi::with('user')->get();

    return view('page.manajemen_data_donasi.index', compact('users', 'dataDonasi'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.manajemen_data_donasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'alamat' => 'required',
    //         'telephone' => 'required',
    //         'email' => 'required|email|unique:data_donasis,email',
    //     ]);

    //     DataDonasi::create($request->all());

    //     return redirect()->route('index.view.datadonasi')
    //         ->with('toast_success', 'Data donasi berhasil ditambahkan');
    // }

     public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:data_donasis,email',
        ]);

        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        DataDonasi::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'user_id' => $userId,
        ]);

        return redirect()->route('index.view.datadonasi')
            ->with('toast_success', 'Data donasi berhasil ditambahkan');
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
        // $donasi = DataDonasi::findOrFail($id);
         $data = [
            'dataDonasi' => DataDonasi::findOrFail($id),
        ];
        return view('page.manajemen_data_donasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:data_donasis,email,' . $id,
        ]);

            $donasi = DataDonasi::findOrFail($id);
            $donasi->update($request->all());

            return redirect()->route('index.view.datadonasi')
                ->with('toast_success', 'Data Donasi Berhasil Diperbarui');
}
    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $dataDonasi = DataDonasi::findOrFail($id);
    //     $dataDonasi->delete();

    //     return redirect()->route('index.view.datadonasi')->with('toast_success', 'Data Donasi Berhasil Dihapus');
    // }
    public function destroy($id)
    {
        // Cari data donasi berdasarkan ID
        $dataDonasi = DataDonasi::find($id);

        // Jika data donasi tidak ditemukan
        if (!$dataDonasi) {
            return redirect()->route('index.view.datadonasi')->with('toast_error', 'Data Donasi tidak ditemukan');
        }

        // Hapus data donasi beserta relasinya
        $dataDonasi->delete();

        // Cari data user berdasarkan ID
        $user = User::find($dataDonasi->user_id);

        // Jika data user tidak ditemukan
        if (!$user) {
            return redirect()->route('index.view.datadonasi')->with('toast_error', 'User tidak ditemukan');
        }

        // Hapus data user berdasarkan role-nya
        if ($user->hasRole('Guest')) {
            return redirect()->route('index.view.datadonasi')->with('toast_error', 'Anda tidak dapat menghapus user dengan role Admin');
        }

        // Hapus data user jika peran (role) adalah Guest atau user biasa
        $user->delete();

        return redirect()->route('index.view.datadonasi')->with('toast_success', 'Data Donasi dan User berhasil dihapus');
    }
}