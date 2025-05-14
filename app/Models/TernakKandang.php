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
        'total_ternak_kandang',
        'nama_pemilik_id'
    ];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'nama_pemilik_id');
    }

    public function ternakFisiks()
    {
        return $this->hasMany(TernakFisik::class, 'ternak_kandang_id');
    }

    public function ternakKondisis()
    {
        return $this->hasMany(TernakKondisi::class, 'ternak_kandang_id');
    }

    public function detailTernakFisiks()
    {
        return $this->hasMany(DetailTernakFisik::class, 'ternak_kandang_id');
    }

    public function detailTernakKondisis()
    {
        return $this->hasMany(DetailTernakKondisi::class, 'ternak_kandang_id');
    }

    public function detailTernakHewans()
    {
        return $this->hasMany(DetailTernakHewan::class, 'ternak_kandang');
    }

    public function detailTernakKandangs()
    {
        return $this->hasMany(DetailTernakKandang::class, 'kode_kandang_id', 'kode_kandang');
    }
}
