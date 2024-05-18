<?php

namespace App\Http\Controllers;

use App\Models\DataDonasi;
use Illuminate\Http\Request;

class DataDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataDonasi']=DataDonasi::all();
        return view('page.manajemen_data_donasi.index', $data);
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
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:data_donasis,email',
        ]);

        DataDonasi::create($request->all());

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
    public function destroy(string $id)
    {
        $dataDonasi = DataDonasi::findOrFail($id);
        $dataDonasi->delete();

        return redirect()->route('index.view.datadonasi')->with('toast_success', 'Data Donasi Berhasil Dihapus');
    }
}