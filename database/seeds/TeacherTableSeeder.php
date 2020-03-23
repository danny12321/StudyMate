<?php

use Illuminate\Database\Seeder;
use App\Teacher;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'name' => encrypt('Rick Meijer'),
        ]);

        Teacher::create([
            'name' => encrypt('Gerard Joling'),
        ]);
    }
}
