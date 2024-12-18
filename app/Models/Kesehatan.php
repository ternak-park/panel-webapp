<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;
    protected $table = 'kesehatan';
    protected $fillable = ['id', 'kode_kesehatan', 'nama_kesehatan', 'deskripsi', 'created_at', 'updated_at'];
}
