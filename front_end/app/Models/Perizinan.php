<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    protected $table = "perizinan";

    public function absenMahasiswa(){
        return $this->belongsTo(AbsenMahasiswa::class,'id_perizinan','id_perizinan');
    }
}
