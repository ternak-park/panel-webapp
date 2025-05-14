<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TernakHewan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ternak_hewan';

    protected $fillable = [
        'tag_hewan',
        'sex_hewan',
        'ternak_jenis_id',
        'gambar_hewan'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'ternak_jenis_id');
    }

    public function ternakFisiks()
    {
        return $this->hasMany(TernakFisik::class, 'ternak_tag_id');
    }

    public function ternakKondisis()
    {
        return $this->hasMany(TernakKondisi::class, 'ternak_tag_id');
    }

    public function detailTernakFisiks()
    {
        return $this->hasMany(DetailTernakFisik::class, 'ternak_tag_id');
    }

    public function detailTernakKondisis()
    {
        return $this->hasMany(DetailTernakKondisi::class, 'ternak_tag_id');
    }

    public function detailTernakHewans()
    {
        return $this->hasMany(DetailTernakHewan::class, 'ternak_tag');
    }
}
