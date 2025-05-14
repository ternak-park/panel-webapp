<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;

    protected $table = 'pemilik';

    protected $fillable = [
        'kode_pemilik',
        'nama_pemilik'
    ];

    public function ternakKandangs()
    {
        return $this->hasMany(TernakKandang::class, 'nama_pemilik_id');
    }

    public function detailTernakHewans()
    {
        return $this->hasMany(DetailTernakHewan::class, 'nama_pemilik');
    }
}
