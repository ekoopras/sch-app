<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ujian extends Model
{
    protected $fillable = [
        'mapel_id',
        'bank_soal_id',
        'token',
        'durasi_menit',
        'is_active',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'is_active' => 'boolean', // Wajib ada di sini
    ];

    // public function kelase()
    // {
    //     return $this->belongsTo(Kelase::class);
    // }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function bankSoal()
    {
        return $this->belongsTo(BankSoal::class);
    }

    public function kelase()
    {
        return $this->belongsToMany(Kelase::class, 'kelas_ujian', 'ujian_id', 'kelase_id');
    }

    public function soals()
    {
        return $this->belongsToMany(Soal::class, 'ujian_soal');
    }

    // GENERATE KODE UJIAN
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ujian) {
            if (empty($ujian->token)) {
                $ujian->token = strtoupper(Str::random(6));
            }
        });
    }
}
