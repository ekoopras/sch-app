<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'mapel',
        'slug',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
