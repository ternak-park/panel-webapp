<?php

namespace Database\Seeders;

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
            UsersSeeder::class,
            SupplierSeeder::class,
            TipeSeeder::class,
            KesehatanSeeder::class,
            StatusSeeder::class,
            ProgramSeeder::class,
            TernakHewanSeeder::class,
            TernakKandangSeeder::class,
            TernakFisikSeeder::class,
            TernakReproduksiSeeder::class,
            TernakEkonomiSeeder::class,
            TernakKondisiSeeder::class,
            TernakDetailSeeder::class,
            PetugasSeeder::class,
            KandangSeeder::class,
            DetailTernakKandangSeeder::class,
        ]);
    }
}
