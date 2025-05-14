<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = [
        'kode_status',
        'nama_status',
        'deskripsi_status'
    ];

    public function detailTernakHewans()
    {
        return $this->hasMany(DetailTernakHewan::class, 'ternak_status');
    }
}
