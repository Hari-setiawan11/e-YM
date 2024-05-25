<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'distribusi_id',
    ];

    public function distribusi()
    {
        return $this->belongsTo(Distribusi::class, 'distribusi_id', 'id');
    }
}
