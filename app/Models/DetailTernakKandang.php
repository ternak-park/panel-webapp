<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTernakKandang extends Model
{
    use HasFactory;

    protected $table = 'detail_ternak_kandang';
    
    protected $fillable = [
        'kode_kandang',
        'hewan_tag',
        'jenis_domba',
        'berat_domba',
        'kondisi_domba',
    ];

    public function kandang()
    {
        return $this->belongsTo(Kandang::class, 'kode_kandang', 'kode_kandang');
    }
    
    public function jenisDomba()
    {
        return $this->belongsTo(Tipe::class, 'jenis_domba', 'id');
    }
    
    public function beratDomba()
    {
        return $this->belongsTo(TernakFisik::class, 'berat_domba', 'id');
    }
    
    public function kondisiDomba()
    {
        return $this->belongsTo(Kesehatan::class, 'kondisi_domba', 'id');
    }
    
    public function hewan()
    {
        return $this->belongsTo(TernakHewan::class, 'hewan_tag', 'tag');
    }
}