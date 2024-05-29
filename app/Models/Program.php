<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'file',
    ];

    public function arsips()
    {
        return $this->hasMany(Arsip::class);
    }
    public function distribusi()
    {
        return $this->hasMany(Distribusi::class);
    }
}
