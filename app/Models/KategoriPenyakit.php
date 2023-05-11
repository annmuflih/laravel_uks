<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPenyakit extends Model
{
    use HasFactory;

    public function dataSakit()
    {
        return $this->hasMany(DataSakit::class);
    }

    public function namaKategoriPenyakit()
    {
        return $this->belongsTo(NamaKategoriPenyakit::class);
    }
}
