<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DetailTernakHewan;
use Carbon\Carbon;

class DetailTernakHewanSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $detailternakhewans = [
            [
                'ternak_tag' => 1,
                'tag_induk_betina' => 'TB001',
                'tag_induk_jantan' => 'TJ001',
                'ternak_kandang' => 1,
                'tag_anak' => 'TA001',
                'nama_pemilik' => 1,
                'tanggal_masuk' => Carbon::now()->subMonths(6),
                'ternak_sex' => 'Jantan',
                'ternak_jenis' => 1,
                'ternak_kesehatan' => 1,
                'ternak_program' => 1,
                'ternak_status' => 1,
                'ternak_usia' => '6 bulan',
                'lama_hari_dipeternakan' => 180,
                'tgl_terjual_mati' => null,
                'ternak_fisik' => 1,
                'bb_masuk_lahir' => 85.50,
                'bb_terbaru' => 105.75,
                'tgl_timbang_terbaru' => Carbon::now()->subDays(7),
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_tag' => 2,
                'tag_induk_betina' => 'TB002',
                'tag_induk_jantan' => 'TJ002',
                'ternak_kandang' => 1,
                'tag_anak' => 'TA002',
                'nama_pemilik' => 1,
                'tanggal_masuk' => Carbon::now()->subMonths(5),
                'ternak_sex' => 'Betina',
                'ternak_jenis' => 2,
                'ternak_kesehatan' => 2,
                'ternak_program' => 2,
                'ternak_status' => 1,
                'ternak_usia' => '5 bulan',
                'lama_hari_dipeternakan' => 150,
                'tgl_terjual_mati' => null,
                'ternak_fisik' => 2,
                'bb_masuk_lahir' => 75.25,
                'bb_terbaru' => 95.50,
                'tgl_timbang_terbaru' => Carbon::now()->subDays(7),
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_tag' => 3,
                'tag_induk_betina' => 'TB003',
                'tag_induk_jantan' => 'TJ003',
                'ternak_kandang' => 2,
                'tag_anak' => 'TA003',
                'nama_pemilik' => 2,
                'tanggal_masuk' => Carbon::now()->subMonths(4),
                'ternak_sex' => 'Betina',
                'ternak_jenis' => 1,
                'ternak_kesehatan' => 3,
                'ternak_program' => 1,
                'ternak_status' => 2,
                'ternak_usia' => '4 bulan',
                'lama_hari_dipeternakan' => 120,
                'tgl_terjual_mati' => null,
                'ternak_fisik' => 3,
                'bb_masuk_lahir' => 65.75,
                'bb_terbaru' => 90.25,
                'tgl_timbang_terbaru' => Carbon::now()->subDays(7),
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_tag' => 4,
                'tag_induk_betina' => 'TB004',
                'tag_induk_jantan' => 'TJ004',
                'ternak_kandang' => 2,
                'tag_anak' => 'TA004',
                'nama_pemilik' => 2,
                'tanggal_masuk' => Carbon::now()->subMonths(3),
                'ternak_sex' => 'Jantan',
                'ternak_jenis' => 2,
                'ternak_kesehatan' => 1,
                'ternak_program' => 2,
                'ternak_status' => 1,
                'ternak_usia' => '3 bulan',
                'lama_hari_dipeternakan' => 90,
                'tgl_terjual_mati' => null,
                'ternak_fisik' => 4,
                'bb_masuk_lahir' => 70.25,
                'bb_terbaru' => 95.00,
                'tgl_timbang_terbaru' => Carbon::now()->subDays(7),
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_tag' => 5,
                'tag_induk_betina' => 'TB005',
                'tag_induk_jantan' => 'TJ005',
                'ternak_kandang' => 3,
                'tag_anak' => 'TA005',
                'nama_pemilik' => 3,
                'tanggal_masuk' => Carbon::now()->subMonths(7),
                'ternak_sex' => 'Jantan',
                'ternak_jenis' => 1,
                'ternak_kesehatan' => 4,
                'ternak_program' => 1,
                'ternak_status' => 3,
                'ternak_usia' => '7 bulan',
                'lama_hari_dipeternakan' => 210,
                'tgl_terjual_mati' => null,
                'ternak_fisik' => 5,
                'bb_masuk_lahir' => 80.00,
                'bb_terbaru' => 110.50,
                'tgl_timbang_terbaru' => Carbon::now()->subDays(7),
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        foreach ($detailternakhewans as $detailternakhewan) {
            DetailTernakHewan::create($detailternakhewan);
        }
    }
}
