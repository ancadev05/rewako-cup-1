<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'username', 'id_username_official');
    }

    public function atlets()
    {
        return $this->hasMany(Atlet::class, 'id_username_official', 'id_username_official');
    }
}
