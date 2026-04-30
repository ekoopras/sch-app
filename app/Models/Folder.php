<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{

    protected $fillable = [
        'name',
        'slug',
    ];

    public function files()
    {
        return $this->hasMany(MediaFile::class);
    }
}
