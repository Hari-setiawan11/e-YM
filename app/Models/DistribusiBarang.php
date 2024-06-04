<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistribusiBarang extends Model
{
    use HasFactory;
     protected $fillable = ['distribusi_id', 'nama_barang', 'volume', 'satuan', 'harga_satuan', 'jumlah'];


     public function data_barang()
    {
        return $this->belongsTo(DataBarang::class, 'data_barang_id', 'id');
    }

    public function distribusi()
    {
        return $this->belongsTo(Distribusi::class,'distribusi_id','id');
    }

}