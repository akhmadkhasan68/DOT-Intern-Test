<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = ["Teknik Informatika", "Teknik Sipil", "Teknik Mesin", "Teknik Industri", "Teknik Elektro", "Manajemen", "Hibungan Internasional"];
        foreach ($majors as $item) {
            Major::create([
                "name" => $item
            ]);
        }
    }
}
