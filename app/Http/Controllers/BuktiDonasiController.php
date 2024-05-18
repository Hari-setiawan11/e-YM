<?php

namespace App\Http\Controllers;

use App\Models\DataDonasi;
use App\Models\BuktiDonasi;
use Illuminate\Http\Request;

class BuktiDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $buktidonasis = BuktiDonasi::all();
    
    return view('page.manajemen_bukti_donasi.index', compact('buktidonasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datadonasis=DataDonasi::all();
        return view('page.manajemen_bukti_donasi.create',compact('datadonasis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'nominal' => 'required|numeric',
        'deskripsi' => 'required|string',
        'file' => 'file|mimes:pdf,docx|max:2048', // Validasi untuk file PDF dan DOCX dengan ukuran maksimal 2MB
        'datadonasi_id' => 'required|exists:datadonasis,id', 
    ]);

    $fileName = null; // Inisialisasi $fileName agar tidak terjadi error pada saat pengecekan

    if ($request->hasFile('file')) {
        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('donasis', $fileName, 'public');
    }

    $datadonasi = DataDonasi::findOrFail($request->datadonasi_id);

    BuktiDonasi::create([
        'tanggal' => $validated['tanggal'],
        'nominal' => $validated['nominal'],
        'deskripsi' => $validated['deskripsi'],
        'datadonasi_id' => $request->datadonasi_id,
        'nama' => $datadonasi->nama,
        'file' => $fileName, // Simpan nama file ke dalam database
    ]);

    return redirect()->route('index.view.bukti')
        ->with('toast_success', 'Bukti Donasi berhasil ditambahkan');
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
        //
    }
}