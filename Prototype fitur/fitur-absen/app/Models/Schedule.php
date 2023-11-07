<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "jadwal";
 
    public function dosenAccounts(){
        return $this->belongsTo(DosenAccounts::class,'id_userdosen','id_userdosen');
    }

    public function absenDosen(){
        return $this->belongsTo(AbsenDosen::class,'id_jadwal','id_jadwal');
    }

    public function mataKuliah(){
        return $this->belongsTo(MataKuliah::class,'id_makul','id_makul');
    }
}
