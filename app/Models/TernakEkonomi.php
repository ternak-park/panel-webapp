<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakEkonomi extends Model
{
    use HasFactory;

    protected $fillable = [
        'ternak_tag',
        'harga_beli',
        'harga_jual',
        'hpp_pembelian',
        'biaya_transportasi',
    ];

    protected $casts = [
        'harga_beli' => 'decimal:2',
        'harga_jual' => 'decimal:2',
        'hpp_pembelian' => 'decimal:2',
        'biaya_transportasi' => 'decimal:2',
    ];

    public function ternak()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag');
    }
}
