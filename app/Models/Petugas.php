<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';
    protected $primaryKey = 'kode_petugas';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'kode_petugas',
        'nama_petugas',
    ];

    public function kandang()
    {
        return $this->hasMany(Kandang::class, 'anak_kandang', 'kode_petugas');
    }
}