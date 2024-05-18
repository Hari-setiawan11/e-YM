<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiDonasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'datadonasi_id',
        'tanggal', 
        'nominal', 
        'Deskripsi', 
        'file',
    ];

    public function datadonasi()
    {
        return $this->belongsTo(DataDonasi::class, 'datadonasi_id','id');
    }
}
