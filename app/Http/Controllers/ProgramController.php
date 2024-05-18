<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index(){
        $data['Program']=Program::all();
        return view('page.manajemen_program.index', $data);
    }

    public function create()
    {
        return view('page.manajemen_program.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('programs', $fileName, 'public');
            $validated['file'] = $fileName;
        }

        Program::create($validated);

        return redirect()->route('index.view.program')->with('toast_success', 'Data dokumen berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
         $data = [
            'Program' => Program::findOrFail($id),
        ];
        return view('page.manajemen_program.edit', $data);
    }

    public function update(Request $request, $id)
    {
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'file' => 'nullable|file|max:2048',
    ]);

    $program = Program::findOrFail($id); // Menggunakan findOrFail untuk mendapatkan data yang akan diupdate

    if ($request->hasFile('file')) {
        $fileName = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('programs', $fileName, 'public');
        $validated['file'] = $fileName;
    }

    $program->update($validated); // Melakukan update dengan data yang telah divalidasi

    return redirect()->route('index.view.program')->with('toast_success', 'Data dokumen berhasil diperbarui.');
    }

    public function destroy($id)
{
    $program = Program::findOrFail($id); // Temukan program berdasarkan ID

    // Hapus file terkait jika ada
    if ($program->file) {
        Storage::disk('public')->delete('programs/' . $program->file);
    }

    // Hapus program dari database
    $program->delete();

    return redirect()->route('index.view.program')->with('toast_success', 'Data dokumen berhasil dihapus.');
}

}
