<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
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
               'name'=>'Admin User',
               'username'=>'admin',
               'email'=>'admin@admin.com',
               'type'=>1,
               'password'=> bcrypt('admin'),
            ],
            [
               'name'=>'Petugas User',
               'username'=>'petugas',
               'email'=>'petugas@petugas.com',
               'type'=> 2,
               'password'=> bcrypt('petugas'),
            ],
            [
               'name'=>'User',
               'username'=>'user',
               'email'=>'user@user.com',
               'type'=>0,
               'password'=> bcrypt('user'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}