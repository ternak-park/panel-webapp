<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;

    protected $table = 'kesehatan';

    protected $fillable = [
        'kode_kesehatan',
        'nama_kesehatan',
        'deskripsi_kesehatan'
    ];

    public function ternakKondisis()
    {
        return $this->hasMany(TernakKondisi::class, 'ternak_kesehatan_id');
    }

    public function detailTernakKondisis()
    {
        return $this->hasMany(DetailTernakKondisi::class, 'ternak_kesehatan_id');
    }

    public function detailTernakHewans()
    {
        return $this->hasMany(DetailTernakHewan::class, 'ternak_kesehatan');
    }
}
