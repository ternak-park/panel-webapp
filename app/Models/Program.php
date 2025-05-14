<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';

    protected $fillable = [
        'kode_program',
        'nama_program',
        'deskripsi_program'
    ];

    public function detailTernakHewans()
    {
        return $this->hasMany(DetailTernakHewan::class, 'ternak_program');
    }
}
