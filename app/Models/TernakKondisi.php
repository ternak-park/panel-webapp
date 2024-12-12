<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakKondisi extends Model
{
    use HasFactory;
    protected $table = 'ternak_kondisi';
    protected $fillable = [
        'ternak_tag',
        'ternak_kesehatan',
        'ternak_status',
    ];

    public function ternak()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag', 'id');
    }

    public function ternakDetail()
    {
        return $this->hasOne(TernakDetail::class, 'ternak_tag', 'tag');
    }

    public function kesehatan()
    {
         return $this->belongsTo(Kesehatan::class, 'ternak_kesehatan', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'ternak_status', 'id');
    }

}
