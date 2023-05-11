<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaKategoriPenyakit extends Model
{
    use HasFactory;

    public function kategoriPenyakit()
    {
        return $this->hasMany(KategoriPenyakit::class);
    }
}
