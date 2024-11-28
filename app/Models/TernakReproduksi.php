<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakReproduksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'ternak_tag',
        'tanggal_birahi',
        'tanggal_kawin',
        'tanggal_ib',
        'nomor_semen',
        'jenis_semen',
    ];

    protected $casts = [
        'tanggal_birahi' => 'date',
        'tanggal_kawin' => 'date',
        'tanggal_ib' => 'date',
    ];

    public function ternak()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag');
    }
}
