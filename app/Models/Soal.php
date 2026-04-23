<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable = [
        'bank_soal_id',
        'soal',
        'gambar',
        'tipe_soal',
        'choice',
        'multiple_choice',
        'matching',
    ];

    protected $casts = [
        'choice' => 'array',
        'multiple_choice' => 'array',
        'matching' => 'array',
    ];

    public function bankSoal()
    {
        return $this->belongsTo(BankSoal::class);
    }
}
