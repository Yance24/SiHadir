<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenAccounts extends Model
{
    protected $table = "dosen";
    protected $primaryKey = 'id_userdosen';

    protected $fillable = ['id_userdosen', 'nama','password','kelamin'];

    public $timestamps = false;
}
