<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::upsert(
            [
                [
                    'id' => 1,
                    'name' => 'Personnel Department',
                ],
                [
                    'id' => 2,
                    'name' => 'Finance Department',
                ]
                ],
                []
        );
    }
}