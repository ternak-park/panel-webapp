<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TernakHewan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            PemilikSeeder::class,
            PetugasSeeder::class,
            JenisSeeder::class,
            KesehatanSeeder::class,
            ProgramSeeder::class,
            StatusSeeder::class,
            TernakHewanSeeder::class,
            TernakKandangSeeder::class,
            TernakFisikSeeder::class,
            TernakKondisiSeeder::class,
            DetailTernakKandangSeeder::class,
            DetailTernakFisikSeeder::class,
            DetailTernakKondisiSeeder::class,
            DetailTernakHewanSeeder::class,
        ]);
    }
}
