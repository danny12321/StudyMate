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
            'name' => 'Rick Meijer',
        ]);

        Teacher::create([
            'name' => 'Gerard Joling',
        ]);
    }
}
