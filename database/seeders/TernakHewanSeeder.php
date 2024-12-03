<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

class TernakHewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example data for seeding
        $data = [
            [
                'tag' => 'HEW-001',
                'jenis_hewan' => 'domba',
                'sex' => 'jantan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'HEW-002',
                'jenis_hewan' => 'domba',
                'sex' => 'betina',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'HEW-003',
                'jenis_hewan' => 'kambing',
                'sex' => 'jantan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'HEW-004',
                'jenis_hewan' => 'kambing',
                'sex' => 'betina',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('ternak_hewan')->insert($data);
    }
}
