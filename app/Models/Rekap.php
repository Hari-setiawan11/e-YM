<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'datadonasi_id',
        'distribusi_id',
    ];


     public function datadonasi()
    {
        return $this->belongsTo(DataDonasi::class, 'datadonasi_id', 'id');
    }

    public function distribusi()
    {
        return $this->belongsTo(Distribusi::class, 'distribusi_id', 'id');
    }
}