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

    public function kesehatan()
    {
    return $this->hasOneThrough(
        Kesehatan::class,
        TernakDetail::class,
        'ternak_tag',  // Foreign key di TernakDetail
        'id',          // Foreign key di User
        'tag',         // Local key di TernakHewan
        'ternak_kesehatan'      // Local key di TernakDetail
        );
    }

    public function status()
    {
    return $this->hasOneThrough(
        Status::class,
        TernakDetail::class,
        'ternak_tag',  // Foreign key di TernakDetail
        'id',          // Foreign key di User
        'tag',         // Local key di TernakHewan
        'ternak_status'      // Local key di TernakDetail
        );
    }

    public function program()
    {
        return $this->hasOneThrough(
            Program::class,
            TernakDetail::class,
            'ternak_tag',  // Foreign key di TernakDetail
            'id',          // Foreign key di User
            'tag',         // Local key di TernakHewan
            'ternak_program'      // Local key di TernakDetail
        );
    }

    public function kandang()
    {
        return $this->hasOneThrough(
            TernakKandang::class,
            TernakDetail::class,
            'ternak_tag',  // Foreign key di TernakDetail
            'id',          // Foreign key di User
            'tag',         // Local key di TernakHewan
            'ternak_kandang'      // Local key di TernakDetail
        );
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
