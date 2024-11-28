<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'ternak_tag',
        'sex',
        'tanggal_masuk',
        'ternak_status',
        'ternak_jenis',
        'ternak_program',
        'ternak_kandang',
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

    public function program()
    {
        return $this->belongsTo(Program::class, 'ternak_program');
    }

    public function kandang()
    {
        return $this->belongsTo(TernakKandang::class, 'ternak_kandang');
    }
}
