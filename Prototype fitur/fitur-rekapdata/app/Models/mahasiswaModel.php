<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['id_user', 'nama', 'semester', 'kelas', 'password', 'kelamin', 'jumlah_sakit', 'jumlah_izin', 'jumlah_alpa', 'status'];
}
