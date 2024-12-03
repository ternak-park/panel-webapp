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
                'nama_program' => 'Fattening',
            ],
            [
                'nama_program' => 'Breeding',
            ],
            [
                'nama_program' => 'Anakan',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
