<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTernakKandang extends Model
{
    use HasFactory;

    protected $table = 'ternak_detail_kandang';

    protected $fillable = [
        'kode_kandang_id',
        'total_ternak',
        'total_bb',
        'nama_petugas_id',
        'nama_pemilik_id'
    ];

    public function ternakKandang()
    {
        return $this->belongsTo(TernakKandang::class, 'kode_kandang_id', 'kode_kandang');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'nama_petugas_id');
    }

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'nama_pemilik_id');
    }
}
