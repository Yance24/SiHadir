<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenDosen extends Model
{
    protected $table = 'absen_dosen';
    protected $fillable = ['id_userdosen','id_jadwal','waktu'];
}
