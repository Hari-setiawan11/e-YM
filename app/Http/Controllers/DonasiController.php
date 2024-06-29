<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil user_id dari user yang sedang login
        $userId = Auth::user()->id;

        // Dapatkan donasi hanya untuk user yang sedang login
        $data['Donasi'] = Donasi::where('user_id', $userId)->get();

        return view('page.manajemen_donasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.manajemen_donasi.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Memvalidasi input dari request
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'nominal' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Mengecek apakah file di-upload dan menyimpannya
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            // Menggunakan nama unik untuk file yang di-upload
            $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $uploadedFile->storeAs('public/donasis', $fileName);
            $validated['file'] = $fileName;
        }

        // Mendapatkan user_id dari user yang sedang login
        $validated['user_id'] = Auth::id();

        // Membuat entri baru pada tabel Donasi
        Donasi::create($validated);

        // Mengarahkan ke halaman dashboard dengan pesan sukses
        return redirect()->route('form.index.donasi')->with('toast_success', 'Data dokumen berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'donasi' => Donasi::findOrFail($id),
        ];
        return view('page.manajemen_donasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'nominal' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ]);
    
        $donasi = Donasi::findOrFail($id); 
        
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/donasis', $fileName);
            $validated['file'] = $fileName;
        }
        
        $donasi->update($validated); 
        
        return redirect()->route('form.index.donasi')->with('toast_success', 'Data dokumen berhasil diperbarui.');
    }
}
