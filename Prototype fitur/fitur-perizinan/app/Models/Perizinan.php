<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    protected $table = 'perizinan';

    public function mahasiswa(){
        return $this->belongsTo(MahasiswaAccount::class,'id_user','id_user');
    }
}
