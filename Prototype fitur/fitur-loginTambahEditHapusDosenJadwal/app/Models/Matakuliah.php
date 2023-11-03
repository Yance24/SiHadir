<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $guarded = ['id_makul'];

    protected $table = 'matakuliah';


    public function jadwal() {
        return $this->hasMany(Jadwal::class);
    }
}
