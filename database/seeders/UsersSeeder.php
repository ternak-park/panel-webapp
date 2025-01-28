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
               'jenis_kelamin' => 'Laki-Laki',
               'telepon' => '123456789',
               'alamat' => 'Jl. Admin No.1',
               'daerah' => 'Wonosalam',
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
               'jenis_kelamin' => 'Laki-Laki',
               'telepon' => '987654321',
               'alamat' => 'Jl. Petugas No.2',
               'daerah' => 'Purwakarta',
               'username' => 'executive',
               'email' => 'executive@executive.com',
               'type' => 2,
               'password' => bcrypt('executive'),
               'gambar_profile' => 'el_ternak.png',
               'email_verified_at' => now(),
               'remember_token' => Str::random(10),
            ],
            [

               'name' => 'User',
               'jenis_kelamin' => 'Perempuan',
               'telepon' => '555666777',
               'alamat' => 'Jl. User No.3',
               'daerah' => 'Cilegon',
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
