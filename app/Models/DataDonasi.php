<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDonasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'alamat',
        'telephone',
        'email',
    ];

    public function rekap()
    {
        return $this->hasMany(Rekap::class);
    }
    public function buktidonasi()
    {
        return $this->hasMany(BuktiDonasi::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
