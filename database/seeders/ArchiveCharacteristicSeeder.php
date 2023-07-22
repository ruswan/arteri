<?php

namespace Database\Seeders;

use App\Models\ArchiveCharacteristic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArchiveCharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArchiveCharacteristic::upsert(
            [
                ['id' => 1, 'name' => 'Umum'],
                ['id' => 2, 'name' => 'Khusus'],
            ],
            []
        );
    }
}