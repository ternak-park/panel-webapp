<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TernakHewan;
use Carbon\Carbon;

class TernakHewanSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $ternakhewans = [
            [
                'tag_hewan' => 'HW1',
                'sex_hewan' => 'Jantan',
                'ternak_jenis_id' => 2,
                'gambar_hewan' => 'gambar1.png',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'tag_hewan' => 'HW2',
                'sex_hewan' => 'Betina',
                'ternak_jenis_id' => 1,
                'gambar_hewan' => 'gambar1.png',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'tag_hewan' => 'HW3',
                'sex_hewan' => 'Jantan',
                'ternak_jenis_id' => 4,
                'gambar_hewan' => 'gambar1.png',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'tag_hewan' => 'HW4',
                'sex_hewan' => 'Jantan',
                'ternak_jenis_id' => 7,
                'gambar_hewan' => 'gambar1.png',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'tag_hewan' => 'HW5',
                'sex_hewan' => 'Betina',
                'ternak_jenis_id' => 8,
                'gambar_hewan' => 'gambar1.png',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        foreach ($ternakhewans as $ternakhewan) {
            TernakHewan::create(attributes: $ternakhewan);
        }
    }
}
