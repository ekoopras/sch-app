<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelase extends Model
{
    protected $fillable = [
        'kelas',
        'slug',
    ];

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
}
