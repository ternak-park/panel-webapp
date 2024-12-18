<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            [
                'kode_program' => 'FTN',
                'nama_program' => 'Fattening',
                'deskripsi' => 'Program penggemukan bertujuan untuk meningkatkan bobot ternak dalam waktu tertentu dengan manajemen pakan dan perawatan intensif.',
            ],
            [
                'kode_program' => 'BRD',
                'nama_program' => 'Breeding',
                'deskripsi' => 'Program pembiakan fokus pada pengelolaan reproduksi ternak untuk menghasilkan anakan berkualitas.'
            ],
            [
                'kode_program' => 'ANK',
                'nama_program' => 'Anakan',
                'deskripsi' => 'Program ini dirancang untuk memantau dan mengelola pertumbuhan anak ternak sejak lahir hingga usia tertentu.'
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
