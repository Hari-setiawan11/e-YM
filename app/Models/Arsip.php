<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $fillable = [
        'programs_id', 'jenisArsip_id', 'file',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'programs_id','id');
    }

    public function jenisArsip()
    {
        return $this->belongsTo(JenisArsip::class, 'jenisArsip_id','id');
    }
}
