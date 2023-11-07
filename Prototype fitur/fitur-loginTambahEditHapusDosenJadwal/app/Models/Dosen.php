<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $primaryKey = 'id_userdosen';

    protected $fillable = ['id_userdosen', 'nama','password','kelamin'];

    public $timestamps = false;

    public function jadwal() {
        return $this->belongsTo(Jadwal::class);
    }
}