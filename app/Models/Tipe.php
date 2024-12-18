<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

    protected $table = 'tipe';
    protected $fillable = ['id', 'kode_tipe', 'nama_tipe', 'deskripsi', 'created_at', 'updated_at'];
}
