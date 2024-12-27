<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grades;

class GradeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ["_id" => "676dd898980ec7b80db28421", "name" => "Umum", "count" => 0],
            ["_id" => "676dd898980ec7b80db28422", "name" => "SD - Kelas 1", "count" => 0],
            ["_id" => "676dd898980ec7b80db28423", "name" => "SD - Kelas 2", "count" => 0],
            ["_id" => "676dd898980ec7b80db28424", "name" => "SD - Kelas 3", "count" => 0],
            ["_id" => "676dd898980ec7b80db28425", "name" => "SD - Kelas 4", "count" => 0],
            ["_id" => "676dd898980ec7b80db28426", "name" => "SD - Kelas 5", "count" => 0],
            ["_id" => "676dd898980ec7b80db28427", "name" => "SD - Kelas 6", "count" => 0],
            ["_id" => "676dd898980ec7b80db28428", "name" => "SMP - Kelas 1", "count" => 0],
            ["_id" => "676dd898980ec7b80db28429", "name" => "SMP - Kelas 2", "count" => 0],
            ["_id" => "676dd898980ec7b80db2842a", "name" => "SMP - Kelas 3", "count" => 0],
            ["_id" => "676dd898980ec7b80db2842b", "name" => "SMA - Kelas 1", "count" => 0],
            ["_id" => "676dd898980ec7b80db2842c", "name" => "SMA - Kelas 2", "count" => 0],
            ["_id" => "676dd898980ec7b80db2842d", "name" => "SMA - Kelas 3", "count" => 0],
            ["_id" => "676dd898980ec7b80db2842e", "name" => "SMK - Kelas 1", "count" => 0],
            ["_id" => "676dd898980ec7b80db2842f", "name" => "SMK - Kelas 2", "count" => 0],
            ["_id" => "676dd898980ec7b80db28430", "name" => "SMK - Kelas 3", "count" => 0],
            ["_id" => "676dd898980ec7b80db28431", "name" => "Kuliah - Semester 1", "count" => 0],
            ["_id" => "676dd898980ec7b80db28432", "name" => "Kuliah - Semester 2", "count" => 0],
            ["_id" => "676dd898980ec7b80db28433", "name" => "Kuliah - Semester 3", "count" => 0],
            ["_id" => "676dd898980ec7b80db28434", "name" => "Kuliah - Semester 4", "count" => 0],
            ["_id" => "676dd898980ec7b80db28435", "name" => "Kuliah - Semester 5", "count" => 0],
            ["_id" => "676dd898980ec7b80db28436", "name" => "Kuliah - Semester 6", "count" => 0],
            ["_id" => "676dd898980ec7b80db28437", "name" => "Kuliah - Semester 7", "count" => 0],
            ["_id" => "676dd898980ec7b80db28438", "name" => "Kuliah - Semester 8", "count" => 0],
        ];

        Grades::insert($data);
    }
}
