<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakKandang extends Model
{
    use HasFactory;
    protected $table = 'ternak_kandang';
    protected $fillable = [
        'kode_kandang',
        'pemilik',
    ];
    // public function pemilik()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }

    public function pemilik()
    {
        return $this->belongsTo(User::class, 'pemilik', 'id');
    }

}
