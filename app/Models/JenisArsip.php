<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisArsip extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'keterangan',
    ];
    public function arsips()
    {
        return $this->hasMany(Arsip::class);
    }
}
