<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id_userdosen'; // Nama kolom primary key
    public $timestamps = false; // Jika Anda tidak memiliki kolom created_at dan updated_at
}
