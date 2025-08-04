<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\KategoriPenyakit;
use App\Models\NamaKategoriPenyakit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11223344'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Petugas UKS',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('11223344'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'Visitor',
            'username' => 'visitor',
            'email' => 'visitor@gmail.com',
            'password' => Hash::make('11223344'),
            'role' => 'visitor',
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Guru'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Murid'
        ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Pencernaan'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Pernapasan'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Kulit'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'THT'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Gigi & Mulut'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Infeksi'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Cedera & Luka'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Hipetermi'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Hipotermi'
        // ]);
        // NamaKategoriPenyakit::create([
        //     'name' => 'Hipertensi'
        // ]);
    }
}
