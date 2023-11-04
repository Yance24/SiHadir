<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenMahasiswa extends Model
{
    protected $table = 'absen_mahasiswa';

    public function schedule(){
        return $this->belongsTo(Schedule::class,'id_jadwal','id_jadwal');
    }

    public function mahasiswa(){
        return $this->belongsTo(MahasiswaAccounts::class,'id_user','id_user');
    }
}
