<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';

    protected $fillable = [
        'kode_jenis',
        'nama_jenis',
        'deskripsi_jenis'
    ];

    public function ternakHewans()
    {
        return $this->hasMany(TernakHewan::class, 'ternak_jenis_id');
    }

    public function ternakKondisis()
    {
        return $this->hasMany(TernakKondisi::class, 'ternak_jenis_id');
    }

    public function detailTernakKondisis()
    {
        return $this->hasMany(DetailTernakKondisi::class, 'ternak_jenis_id');
    }

    public function detailTernakHewans()
    {
        return $this->hasMany(DetailTernakHewan::class, 'ternak_jenis');
    }
}
