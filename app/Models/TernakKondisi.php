<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakKondisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'ternak_tag',
        'status_kepemilikan',
        'ternak_status',
    ];

    public function ternak()
    {
        return $this->belongsTo(TernakHewan::class, 'ternak_tag');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'ternak_status');
    }
}
