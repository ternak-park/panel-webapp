<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Program;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $programs = [
            [
                'kode_program' => 'PFTN', // Penggemukan
                'nama_program' => 'Fattening',
                'deskripsi_program' => 'Adalah program untuk penggemukan ternak',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'kode_program' => 'PBRD', // Perkawinan
                'nama_program' => 'Breeding',
                'deskripsi_program' => 'Adalah program untuk perkawinan ternak',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'kode_program' => 'PANK', // Peranakan
                'nama_program' => 'Anakan',
                'deskripsi_program' => 'Adalah program untuk Peranakan ternak',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        foreach ($programs as $program) {
            Program::create(attributes: $program);
        }
    }
}
