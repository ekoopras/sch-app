<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $fillable = ['key', 'items'];

    // Wajib di-cast ke array agar Laravel otomatis mengubah JSON menjadi Array PHP
    protected $casts = [
        'items' => 'array',
    ];
}
