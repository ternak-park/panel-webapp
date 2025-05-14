<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTernakFisik extends Model
{
    use HasFactory;

    protected $table = 'ternak_detail_fisik';

    protected $fillable = [
        'ternak_fisik_id',
        'ternak_tag_id',
        'ternak_kandang_id',
        'tgl_masuk_lahir',
        'berat_masuk',
        'tgl_timbang_terakhir',
        'berat_terakhir',
        'kenaikan_berat'
    ];

    public function ternakFisik()
    {
        return $this->belongsTo(TernakFisik::class, 'ternak_fisik_id');
    }
    public function ternakHewan()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag_id');
    }

    public function ternakKandang()
    {
        return $this->belongsTo(TernakKandang::class, 'ternak_kandang_id');
    }

    public function detailTernakHewan()
    {
        return $this->hasOne(DetailTernakHewan::class, 'ternak_fisik');
    }
}
