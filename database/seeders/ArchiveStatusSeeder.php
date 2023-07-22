<?php

namespace Database\Seeders;

use App\Models\ArchiveStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArchiveStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArchiveStatus::upsert([
            ['id' => 1, 'name' => 'Verified'],
            ['id' => 2, 'name' => 'Unverified'],
        ],[]);
    }
}