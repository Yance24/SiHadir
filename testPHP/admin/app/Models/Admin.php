<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id_admin'; // Nama kolom primary key
    public $timestamps = false; // Jika Anda tidak memiliki kolom created_at dan updated_at

}
