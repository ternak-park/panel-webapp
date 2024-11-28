<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Jenis;
use App\Models\Program;
use App\Models\Status;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CreateUsersSeeder::class,
            CreateSupplierSeeder::class,

            CreateJenisSeeder::class,
            CreateStatusSeeder::class,
            CreateProgramSeeder::class,
            CreateStatusSeeder::class
        ]);
    }
}
