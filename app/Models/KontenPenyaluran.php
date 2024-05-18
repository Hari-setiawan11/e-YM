<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenPenyaluran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'keterangan',
        'foto',
    ];
}
