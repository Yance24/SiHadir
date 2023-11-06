<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    public $table = 'dosen';
    public $datadata = ['id_userdosen', 'nama', 'password', 'kelamin'];
}
