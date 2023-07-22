<?php

namespace Database\Seeders;

use App\Models\ArchiveType;
use Illuminate\Database\Seeder;

class ArchiveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArchiveType::upsert(
            [
                ['id' => 1, 'name' => 'Dokumen Induk'],
                ['id' => 2, 'name' => 'Formulir'],
                ['id' => 3, 'name' => 'Laporan'],
                ['id' => 4, 'name' => 'MoU/MoA/PKS/IA'],
                ['id' => 5, 'name' => 'Pedoman/Panduan'],
                ['id' => 6, 'name' => 'Peraturan'],
                ['id' => 7, 'name' => 'Sertifikat'],
                ['id' => 8, 'name' => 'SK'],
                ['id' => 9, 'name' => 'SOP'],
                ['id' => 10, 'name' => 'Surat Tugas'],
            ],
            []
        );
    }
}