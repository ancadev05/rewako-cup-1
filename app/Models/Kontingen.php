<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontingen extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function official()
    // {
    //     return $this->belongsTo(Official::class);
    // }

    // public function atlet()
    // {
    //     return $this->hasMany(Atlet::class);
    // }
}
