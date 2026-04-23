<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama',
        'absen',
        'kelase_id',
        'nis',
    ];

    public function kelase()
    {
        return $this->belongsTo(Kelase::class);
    }
}
