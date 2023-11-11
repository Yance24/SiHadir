<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $primaryKey = 'id_jadwal';

    public $timestamps = false;


    protected $fillable = [
        'id_makul', 'id_userdosen', 'id_semester', 'id_tahunajar', 'hari', 'kelas', 'jam_mulai', 'jam_selesai',
    ];

    public function matakuliah() {
        return $this->belongsTo(Matakuliah::class, 'id_makul','id_makul');
    }

    public function dosen() {
        return $this->belongsTo(Dosen::class,'id_userdosen','id_userdosen');
    }

    public function semester() {
        return $this->belongsTo(Semester::class);
    }

    public function tahun_ajar() {
        return $this->belongsTo(Tahun_ajar::class);
    }
}
