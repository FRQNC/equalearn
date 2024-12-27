<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topics;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ["_id" => "676dd8e3980ec7b80db2843a", "name" => "Umum", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2843b", "name" => "Bahasa Indonesia", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2843c", "name" => "Bahasa Inggris", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2843d", "name" => "Bahasa Jepang", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2843e", "name" => "Ilmu Pengetahuan Alam", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2843f", "name" => "Sejarah Indonesia", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28440", "name" => "Ilmu Pengetahuan Sosial", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28441", "name" => "Biologi", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28442", "name" => "Kimia", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28443", "name" => "Fisika", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28444", "name" => "Matematika", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28445", "name" => "Sosiologi", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28446", "name" => "Ekonomi", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28447", "name" => "Geografi", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28448", "name" => "Bahasa Prancis", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db28449", "name" => "Bahasa Korea", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2844a", "name" => "Bahasa Jerman", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2844b", "name" => "Bahasa Sunda", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2844c", "name" => "Seni Budaya", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2844d", "name" => "Pendidikan Agama dan Budi Pekerti", "count" => 0],
            ["_id" => "676dd8e3980ec7b80db2844e", "name" => "Pendidikan Pancasila dan Kewarganegaraan", "count" => 0],
            ["_id" => "676ddc24980ec7b80db28450", "name" => "Lain-lain", "count" => 0],
        ];

        Topics::insert($data);
    }
}
