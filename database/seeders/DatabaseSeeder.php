<?php

namespace Database\Seeders;

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
            'password' => Hash::make('bismillahsecret'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Petugas UKS',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('secret12435'),
            'role' => 'petugas',
        ]);
        User::create([
            'name' => 'Visitor',
            'username' => 'visitor',
            'email' => 'visitor@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'visitor',
        ]);
    }
}
