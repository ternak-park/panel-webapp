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
    public function detail()
    {
        return $this->hasOne(TernakDetail::class, 'ternak_tag', 'tag');
    }
    public function ternakDetail()
    {
        return $this->hasOne(TernakDetail::class, 'ternak_tag', 'tag');
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'id');
    }

    public function kandang()
    {
        return $this->belongsTo(TernakKandang::class, 'id', 'pemilik');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id');
    // }

}
