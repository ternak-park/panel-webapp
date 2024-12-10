<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakHewan extends Model
{
    use HasFactory;
    protected $table = 'ternak_hewan';
    protected $fillable = [
        'id',
        'tag',
        'jenis',
        'sex',
        'ternak_tipe',
        'gambar_hewan',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function detail()
    {
        return $this->hasOne(TernakDetail::class, 'ternak_tag', 'tag');
    }
    public function ternakDetail()
    {
        return $this->hasOne(TernakDetail::class, 'ternak_tag', 'tag');
    }
    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'ternak_tipe', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'id');
    }

    public function kandang()
    {
        return $this->belongsTo(TernakKandang::class, 'id');
    }

    public function pemilik()
    {
        return $this->hasOneThrough(
            User::class,
            TernakDetail::class,
            'ternak_tag',  // Foreign key di TernakDetail
            'id',          // Foreign key di User
            'tag',         // Local key di TernakHewan
            'pemilik'      // Local key di TernakDetail
        );
    }


}
