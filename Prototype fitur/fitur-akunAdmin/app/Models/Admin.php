<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id_admin'; // Nama kolom primary key
    protected $fillable = ['id_admin', 'nama', 'password'];
    public $timestamps = false; // Jika Anda tidak memiliki kolom created_at dan updated_at
}
