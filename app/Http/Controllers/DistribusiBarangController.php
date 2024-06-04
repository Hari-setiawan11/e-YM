<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Distribusi;
use App\Models\DistribusiBarang;
use Illuminate\Http\Request;
use TCPDF;

class DistribusiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($distribusi_id)
    {
        $data = [
            'distribusi' => Distribusi::findOrFail($distribusi_id),
            'distribusi_id' => $distribusi_id,
            'distribusi_barang' => DistribusiBarang::where('distribusi_id', $distribusi_id)->get(),
        ];

        return view('page.distribusi_barang.index', $data);
    }


   public function cetakPDF($distribusi_id)
{
    $distribusi_barang = DistribusiBarang::where('distribusi_id', $distribusi_id)->get();
    $program = $distribusi_barang->first()->distribusi->program;
    $tanggal = \Carbon\Carbon::parse($program->tanggal)->format('d F Y');
    $namaProgram = $program->nama;

    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator('Creator');
    $pdf->SetAuthor('Author');
    $pdf->SetTitle($namaProgram. '-'. $tanggal);
    $pdf->setPrintHeader(false);

    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 12);



    $html = view('page.manajemen_data_barang.cetak_data', compact('distribusi_barang'))->render();

    // Ubah path gambar ke path absolut
    $html = str_replace('src="{{ asset(', 'src="' . public_path(), $html);

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdfContent = $pdf->Output($namaProgram.'-'.$tanggal); // Simpan PDF ke dalam variabel $pdfContent

    // Tampilkan PDF dalam browser untuk review
    return response($pdfContent)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="laporan_data_barang.pdf"');
}

    /**
     * Show the form for creating a new resource.
     */
    // public function create($distribusi_id)
    // {
    //    $distribusi = Distribusi::findOrFail($distribusi_id);

    //     $data_barang = DataBarang::whereDoesntHave('distribusi_barang')
    //         ->get();

    //     $data = [
    //         'distribusi_id' => $distribusi_id,
    //         'data_barang' => $data_barang,
    //     ];

    //     return view('page.manajemen_distribusi.form_data_barang', $data);
    // }

    // public function create($distribusi_id)
    // {
    //     $distribusi = Distribusi::findOrFail($distribusi_id);

    //     $data_barang = DataBarang::whereDoesntHave('distribusibarang', function ($query) use ($distribusi_id) {
    //         $query->where('distribusi_id', $distribusi_id);
    //     })->get();

    //     $data = [
    //         'distribusi_id' => $distribusi_id,
    //         'data_barang' => $data_barang,
    //     ];
    //     // dd($data);

    //     return view('page.manajemen_distribusi.form_data_barang', $data);
    // }

    /**
     * Store a newly created resource in storage.
     */

     public function create($distribusi_id)
    {
        return view('page.distribusi_barang.create', compact('distribusi_id'));
    }

// public function store(Request $request, $distribusi_id)
// {
//     // Validasi bahwa minimal satu checkbox dipilih dan setiap ID data_barang ada
//     $validated = $request->validate([
//         'data_barangs' => 'required|array|min:1',
//         'data_barangs.*' => 'exists:data_barangs,id',
//     ]);

//     $data_barangIds = $validated['data_barangs'];

//     // Lakukan penyimpanan hanya jika minimal satu checkbox dipilih
//     if (count($data_barangIds) > 0) {
//         foreach ($data_barangIds as $data_barangId) {
//             DistribusiBarang::create([
//                 'distribusi_id' => $distribusi_id,
//                 'data_barang_id' => $data_barangId,
//             ]);
//         }

//         return redirect()->route('index.view.distribusibarang', $distribusi_id)
//             ->with('toast_success', 'Data barang berhasil ditambahkan.');
//     } else {
//         // Redirect kembali dengan pesan error jika tidak ada checkbox yang dipilih
//         return redirect()->route('index.view.distribusibarang', $distribusi_id)
//             ->with('error', 'Pilih setidaknya satu data barang.');
//     }
// }

public function store(Request $request)
{
    $request->validate([
        'distribusi_id' => 'required|exists:distribusis,id',
        'nama_barang' => 'required',
        'volume' => 'required|numeric',
        'satuan' => 'required',
        'harga_satuan' => 'required|numeric',
        'jumlah' => 'required|integer',
    ]);

    DistribusiBarang::create([
        'distribusi_id' => $request->distribusi_id,
        'nama_barang' => $request->nama_barang,
        'volume' => $request->volume,
        'satuan' => $request->satuan,
        'harga_satuan' => $request->harga_satuan,
        'jumlah' => $request->jumlah,
    ]);

    return redirect()->route('index.view.distribusibarang', $request->distribusi_id);
}


//    public function store(Request $request, $distribusi_id)
// {
//     $validated = $request->validate([
//         'data_barangs' => ['required', 'array', 'min:1'],
//         'data_barangs.*' => ['exists:data_barangs,id'], // Validasi bahwa setiap ID data_barang ada
//     ]);

//     $data_barangIds = $validated['data_barangs'];

//     foreach ($data_barangIds as $data_barangId) {
//         DistribusiBarang::create([
//             'distribusi_id' => $distribusi_id,
//             'data_barangs_id' => $data_barangId, // Perhatikan nama field yang digunakan
//         ]);
//     }

//     return redirect()->route('index.view.distribusibarang', $distribusi_id);
// }

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
    public function edit($id)
    {
        $distribusiBarang = DistribusiBarang::findOrFail($id);
        return view('page.distribusi_barang.edit', compact('distribusiBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'distribusi_id' => 'required|exists:distribusis,id',
        'nama_barang' => 'required',
        'volume' => 'required|numeric',
        'satuan' => 'required',
        'harga_satuan' => 'required|numeric',
        'jumlah' => 'required|integer',
    ]);

    $distribusiBarang = DistribusiBarang::findOrFail($id);

    // Debugging
    // dd($request->all());

    $distribusiBarang->update([
        'distribusi_id' => $request->distribusi_id,
        'nama_barang' => $request->nama_barang,
        'volume' => $request->volume,
        'satuan' => $request->satuan,
        'harga_satuan' => $request->harga_satuan,
        'jumlah' => $request->jumlah,
    ]);

    return redirect()->route('index.view.distribusibarang', $request->distribusi_id)->with('success', 'Data barang berhasil diupdate.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $distribusiBarang = DistribusiBarang::findOrFail($id);

        // Lakukan penghapusan data distribusi barang
        $distribusiBarang->delete();

    return redirect()->back()->with('toast_success', 'Data barang berhasil dihapus.');
    }
}