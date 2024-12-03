<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TernakHewan extends Model
{
    use HasFactory;
    protected $table = 'ternak_hewan';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'telepon',
        'alamat',
        'daerah',
        'username',
        'email',
        'type',
        'password',
    ];
}
