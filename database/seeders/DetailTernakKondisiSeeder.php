<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DetailTernakKondisi;
use Carbon\Carbon;

class DetailTernakKondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $detailternakkondisis = [
            [
                'ternak_kondisi_id' => 1,
                'tgl_kejadian_kondisi' => Carbon::now()->subDays(10),
                'ternak_tag_id' => 1,
                'ternak_kandang_id' => 1,
                'ternak_jenis_id' => 1,
                'sex_hewan_kondisi' => 'Jantan',
                'ternak_kesehatan_id' => 2, // Misalnya ID 2 untuk kondisi sakit
                'keterangan' => 'Demam ringan',
                'penanganan' => 'Pemberian antibiotik dan vitamin',
                'tag_baru' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_kondisi_id' => 2,
                'tgl_kejadian_kondisi' => Carbon::now()->subDays(15),
                'ternak_tag_id' => 3,
                'ternak_kandang_id' => 2,
                'ternak_jenis_id' => 2,
                'sex_hewan_kondisi' => 'Betina',
                'ternak_kesehatan_id' => 3, // Misalnya ID 3 untuk kondisi cedera
                'keterangan' => 'Luka pada kaki kanan depan',
                'penanganan' => 'Dibersihkan dan diberi obat luka',
                'tag_baru' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_kondisi_id' => 1,
                'tgl_kejadian_kondisi' => Carbon::now()->subDays(5),
                'ternak_tag_id' => 5,
                'ternak_kandang_id' => 3,
                'ternak_jenis_id' => 1,
                'sex_hewan_kondisi' => 'Jantan',
                'ternak_kesehatan_id' => 4, // Misalnya ID 4 untuk kondisi pemulihan
                'keterangan' => 'Masa pemulihan setelah sakit',
                'penanganan' => 'Pemberian vitamin dan pemantauan rutin',
                'tag_baru' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_kondisi_id' => 3,
                'tgl_kejadian_kondisi' => Carbon::now()->subDays(20),
                'ternak_tag_id' => 2,
                'ternak_kandang_id' => 1,
                'ternak_jenis_id' => 2,
                'sex_hewan_kondisi' => 'Betina',
                'ternak_kesehatan_id' => 2, // Misalnya ID 2 untuk kondisi sakit
                'keterangan' => 'Diare ringan',
                'penanganan' => 'Pemberian obat anti diare dan elektrolit',
                'tag_baru' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_kondisi_id' => 1,
                'tgl_kejadian_kondisi' => Carbon::now()->subDays(8),
                'ternak_tag_id' => 4,
                'ternak_kandang_id' => 2,
                'ternak_jenis_id' => 1,
                'sex_hewan_kondisi' => 'Jantan',
                'ternak_kesehatan_id' => 1, // Misalnya ID 1 untuk kondisi sehat
                'keterangan' => 'Pemeriksaan rutin',
                'penanganan' => 'Pemberian vitamin tambahan',
                'tag_baru' => '',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        foreach ($detailternakkondisis as $detailternakkondisi) {
            DetailTernakKondisi::create($detailternakkondisi);
        }
    }
}
