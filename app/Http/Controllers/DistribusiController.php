<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Program;
use App\Models\Distribusi;
use Illuminate\Http\Request;
use App\Models\DistribusiBarang;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // private function formatDate($date, $format = 'd M Y')
    // {
    //     return Carbon::createFromFormat('Y-m-d', $date)->format($format);
    // }
    public function index()
    {
        // $data['distribusi']=Distribusi::all();
        $distribusis = Distribusi::with('program')->paginate();

        return view('page.manajemen_distribusi.index', compact('distribusis'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = Program::all();
        return view('page.manajemen_distribusi.create', compact('program'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'programs_id' => 'required|exists:programs,id',
        'tanggal' => 'required|date',
        'tempat' => 'required',
        'penerima_manfaat' => 'required',
        'anggaran' => 'required|numeric',
        'file' => 'required|file|mimes:pdf|max:2048',
    ]);

    // Mengambil total pengeluaran dari distribusi_barang
    $totalPengeluaran = DistribusiBarang::where('distribusi_id', $request->distribusi_id)->sum('jumlah');

    $fileName = null;
    if ($request->hasFile('file')) {
        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('distribusis', $fileName, 'public');
    }

    $distribusi = new Distribusi();
    $distribusi->programs_id = $request->programs_id;
    $distribusi->tanggal = $request->tanggal;
    $distribusi->tempat = $request->tempat;
    $distribusi->penerima_manfaat = $request->penerima_manfaat;
    $distribusi->anggaran = $request->anggaran;
    $distribusi->pengeluaran = $totalPengeluaran;  // Menggunakan total pengeluaran dari DistribusiBarang
    $distribusi->sisa = $request->anggaran - $totalPengeluaran;  // Menghitung sisa anggaran
    $distribusi->file = $fileName;

    $distribusi->save();

    return redirect()->route('index.view.distribusi')->with('toast_success', 'Data distribusi berhasil ditambahkan');
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
        $distribusi = Distribusi::with('program')->findOrFail($id);
        $programs = Program::all();

        // dd($id);

        return view('page.manajemen_distribusi.edit', compact('distribusi', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
    $request->validate([
        'programs_id' => 'required|exists:programs,id',
        'tanggal' => 'required|date',
        'tempat' => 'required',
        'penerima_manfaat' => 'required',
        'anggaran' => 'required|numeric',
        'pengeluaran' => 'required|numeric',
        'file' => 'nullable|file|mimes:pdf|max:2048',
    ]);

    $distribusi = Distribusi::findOrFail($id);

    $distribusi->programs_id = $request->programs_id;
    $distribusi->tanggal = $request->tanggal;
    $distribusi->tempat = $request->tempat;
    $distribusi->penerima_manfaat = $request->penerima_manfaat;
    $distribusi->anggaran = $request->anggaran;
    $distribusi->pengeluaran = $request->pengeluaran;
    $distribusi->sisa = $request->anggaran - $request->pengeluaran;

    if ($request->hasFile('file')) {
        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('distribusis', $fileName, 'public');
        $distribusi->file = $fileName;
    }

    $distribusi->save();

    return redirect()->route('index.view.distribusi')->with('toast_success', 'Data distribusi berhasil diperbarui');
}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $distribusi = Distribusi::findOrFail($id);
        $distribusi->delete();

        return redirect()->route('index.view.distribusi')->with('toast_success', 'Data distribusi berhasil dihapus');
    }
}