<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTernakHewan extends Model
{
    use HasFactory;

    protected $table = 'ternak_detail_hewan';

    protected $fillable = [
        'ternak_tag',
        'tag_induk_betina',
        'tag_induk_jantan',
        'ternak_kandang',
        'tag_anak',
        'nama_pemilik',
        'tanggal_masuk',
        'ternak_sex',
        'ternak_jenis',
        'ternak_kesehatan',
        'ternak_program',
        'ternak_status',
        'ternak_usia',
        'lama_hari_dipeternakan',
        'tgl_terjual_mati',
        'ternak_fisik',
        'bb_masuk_lahir',
        'bb_terbaru',
        'tgl_timbang_terbaru'
    ];

    public function ternakHewan()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag');
    }

    public function ternakKandang()
    {
        return $this->belongsTo(TernakKandang::class, 'ternak_kandang');
    }

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'nama_pemilik');
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'ternak_jenis');
    }

    public function kesehatan()
    {
        return $this->belongsTo(Kesehatan::class, 'ternak_kesehatan');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'ternak_program');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'ternak_status');
    }

    public function ternakFisik()
    {
        return $this->belongsTo(TernakFisik::class, 'ternak_fisik');
    }
}
