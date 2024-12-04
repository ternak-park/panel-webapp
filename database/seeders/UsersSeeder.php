<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
               'name' => 'Admin User',
               'jenis_kelamin' => 'lakilaki',
               'telepon' => '123456789',
               'alamat' => 'Jl. Admin No.1',
               'daerah' => 'wonosalam',
               'username' => 'admin',
               'email' => 'admin@admin.com',
               'type' => 1,
               'password' => bcrypt('admin'),
               'gambar_profile' => 'el_ternak.png',
               'email_verified_at' => now(),
               'remember_token' => Str::random(10),
            ],
            [
               'name' => 'Petugas User',
               'jenis_kelamin' => 'lakilaki',
               'telepon' => '987654321',
               'alamat' => 'Jl. Petugas No.2',
               'daerah' => 'purwakarta',
               'username' => 'petugas',
               'email' => 'petugas@petugas.com',
               'type' => 2,
               'password' => bcrypt('petugas'),
               'gambar_profile' => 'el_ternak.png',
               'email_verified_at' => now(),
               'remember_token' => Str::random(10),
            ],
            [
               'name' => 'User',
               'jenis_kelamin' => 'perempuan',
               'telepon' => '555666777',
               'alamat' => 'Jl. User No.3',
               'daerah' => 'cilegon',
               'username' => 'user',
               'email' => 'user@user.com',
               'type' => 0,
               'password' => bcrypt('user'),
               'gambar_profile' => 'el_ternak.png',
               'email_verified_at' => now(),
               'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
