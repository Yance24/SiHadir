<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    // public $timestamps = false; // Menonaktifkan timestamps

    protected $fillable = [
        'id_jadwal',
        'id_makul',
        'id_userdosen',
        'id_semester',
        'id_tahunajar',
        'hari',
        'kelas',
        'jam_mulai',
        'jam_selesai',
    ];
}
