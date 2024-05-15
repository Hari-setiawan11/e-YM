<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'program_id',
        'nama',
        'tanggal',
        'tempat',
        'penerima_manfaat',
        'anggaran',
        'pengeluaran',
        'sisa',
        'file',
    ];
    public function program()
    {
        return $this->belongsTo(Program::class, 'programs_id','id');
    }

    public function distribusibarang()
    {
        return $this->belongsTo(DistribusiBarang::class, 'distribusi_id','id');
    }

    public function rekap()
    {
        return $this->hasMany(Rekap::class);
    }
}
