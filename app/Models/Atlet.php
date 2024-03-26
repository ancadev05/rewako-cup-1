<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id');
    }

    public function kontingen()
    {
        return $this->belongsTo(Kontingen::class, 'id_kontingen', 'id');
    }

    public function kelas_tanding()
    {
        return $this->belongsTo(KelasTanding::class,'id_kelas_tanding', 'id');
    }

    public function seni()
    {
        return $this->belongsTo(Seni::class,'id_seni', 'id');
    }
}
