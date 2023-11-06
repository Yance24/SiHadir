<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    public $table = 'mahasiswa';
    public $fillable = ['id_user', 'Nama', 'Kelas', 'Password', 'Gender'];
}
