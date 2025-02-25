<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    use HasFactory;

    protected $table = 'kandang';
    protected $primaryKey = 'kode_kandang';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'kode_kandang',
        'anak_kandang',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'anak_kandang', 'kode_petugas');
    }
    
    public function detailTernakKandang()
    {
        return $this->hasMany(DetailTernakKandang::class, 'kode_kandang', 'kode_kandang');
    }
}

