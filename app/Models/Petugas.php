<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'kode_petugas',
        'nama_petugas'
    ];

    // A petugas might be associated with kandang through DetailTernakKandang
    public function detailTernakKandangs()
    {
        return $this->hasMany(DetailTernakKandang::class, 'nama_petugas_id');
    }
}
