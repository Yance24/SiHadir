<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun_ajar extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajar';

    public function jadwal() {
        return $this->hasMany(Jadwal::class);
    }
}
