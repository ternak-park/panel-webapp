<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakDetail extends Model
{
    use HasFactory;
    protected $table = 'ternak_detail';
    protected $fillable = [
        'id',
        'ternak_tag',
        'ternak_induk',
        'sex',
        'tanggal_masuk',
        'ternak_status',
        'ternak_jenis',
        'ternak_kesehatan',
        'ternak_program',
        'ternak_kandang',
        'pemilik'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
    ];

    public function ternak()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'ternak_status');
    }

    public function kesehatan()
    {
        return $this->belongsTo(Kesehatan::class, 'ternak_kesehatan');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'ternak_program');
    }

    public function kandang()
    {
        return $this->belongsTo(TernakKandang::class, 'ternak_kandang');
    }

    public function pemilik()
    {
        return $this->belongsTo(User::class, 'pemilik', 'id');
    }

}
