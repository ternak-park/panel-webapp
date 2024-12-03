<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = ['id', 'nama_status', 'created_at', 'updated_at'];

    public function ternakDetails()
{
    return $this->hasMany(TernakDetail::class, 'ternak_status');
}

}
