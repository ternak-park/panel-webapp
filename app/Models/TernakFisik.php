<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakFisik extends Model
{
    use HasFactory;

    protected $fillable = [
        'ternak_tag',
        'berat_masuk',
        'berat_terakhir',
        'kenaikan_berat',
    ];

    protected $casts = [
        'berat_masuk' => 'decimal:2',
        'berat_terakhir' => 'decimal:2',
        'kenaikan_berat' => 'decimal:2',
    ];

    public function ternak()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag');
    }
}
