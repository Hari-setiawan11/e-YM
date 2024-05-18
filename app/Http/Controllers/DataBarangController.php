<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Distribusi;
use Illuminate\Http\Request;
use TCPDF;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $dataBarang = DataBarang::with('distribusi')->get();
        // $distribusi=Distribusi::findOrFail($id);



        $data['dataBarang']=DataBarang::all();
        return view('page.manajemen_data_barang.index', $data);
    }

//    public function cetakPDF()
// {
//     $dataBarang = DataBarang::all();

//     $pdf = new TCPDF();
//     $pdf->SetCreator('Creator');
//     $pdf->SetAuthor('Author');
//     $pdf->SetTitle('Data Barang');

//     $pdf->AddPage();
//     $pdf->SetFont('Helvetica', '', 12);

//     $html = view('page.manajemen_data_barang.cetak_data', compact('dataBarang'))->render();

//     // Ubah path gambar ke path absolut
//     $html = str_replace('src="{{ asset(', 'src="' . public_path(), $html);

//     $pdf->writeHTML($html, true, false, true, false, '');

//     $pdfContent = $pdf->Output('laporan_data_barang.pdf', 'S'); // Simpan PDF ke dalam variabel $pdfContent

//     // Tampilkan PDF dalam browser untuk review
//     return response($pdfContent)
//         ->header('Content-Type', 'application/pdf')
//         ->header('Content-Disposition', 'inline; filename="laporan_data_barang.pdf"');
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.manajemen_data_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'volume' => 'required|numeric',
            'satuan' => 'required',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        $dataBarang = new DataBarang();
    $dataBarang->nama_barang = $validated['nama_barang'];
    $dataBarang->volume = $validated['volume'];
    $dataBarang->satuan = $validated['satuan'];
    $dataBarang->harga_satuan = $validated['harga_satuan'];
    $dataBarang->jumlah = $validated['jumlah'];
    $dataBarang->save();


        return redirect()->route('index.view.databarang')->with('toast_success', 'Data Barang Berhasil Ditambahkan');
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
        $data = [
            'dataBarang' => DataBarang::findOrFail($id),
        ];
        return view('page.manajemen_data_barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBarang = DataBarang::findOrFail($id);

        $validated = $request->validate([
            'nama_barang' => 'required',
            'volume' => 'required|numeric',
            'satuan' => 'required',
            'harga_satuan' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        $dataBarang = DataBarang::findOrFail($id);
    $dataBarang->nama_barang = $validated['nama_barang'];
    $dataBarang->volume = $validated['volume'];
    $dataBarang->satuan = $validated['satuan'];
    $dataBarang->harga_satuan = $validated['harga_satuan'];
    $dataBarang->jumlah = $validated['jumlah'];
    $dataBarang->save();


        return redirect()->route('index.view.databarang')->with('toast_success', 'Data Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataBarang = DataBarang::findOrFail($id);
        $dataBarang->delete();

        return redirect()->route('index.view.databarang')->with('toast_success', 'Data Barang Berhasil Dihapus');
    }
}
