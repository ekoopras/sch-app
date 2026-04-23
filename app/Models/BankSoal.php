<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankSoal extends Model
{
    protected $fillable = [
        'title',
        'mapel_id',
        'kelas',
        'semester',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function soals(): HasMany
    {
        return $this->hasMany(Soal::class);
    }
}
