<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTernakKondisi extends Model
{
    use HasFactory;

    protected $table = 'ternak_detail_kondisi';

    protected $fillable = [
        'ternak_kondisi_id',
        'tgl_kejadian_kondisi',
        'ternak_tag_id',
        'ternak_kandang_id',
        'ternak_jenis_id',
        'sex_hewan_kondisi',
        'ternak_kesehatan_id',
        'keterangan',
        'penanganan',
        'tag_baru'
    ];

    public function ternakHewan()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag_id');
    }

    public function ternakKandang()
    {
        return $this->belongsTo(TernakKandang::class, 'ternak_kandang_id');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'ternak_jenis_id');
    }

    public function kesehatan()
    {
        return $this->belongsTo(Kesehatan::class, 'ternak_kesehatan_id');
    }

    public function detailTernakKondisi()
    {
        return $this->belongsTo(DetailTernakKondisi::class, 'ternak_kondisi_id');
    }
}
