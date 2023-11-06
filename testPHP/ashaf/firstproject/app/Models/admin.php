<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $tableadmin = 'admin';
    protected $isitableadmin = ['id_admin', 'nama', 'password'];
}
