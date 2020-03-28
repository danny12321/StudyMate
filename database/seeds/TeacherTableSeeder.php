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
        //
        Teacher::create([
            'name' => 'Rik Meijer',
        ]);

        Teacher::create([
            'name' => 'Julian van der Kleijn',
        ]);

        Teacher::create([
            'name' => 'Loes de Veth',
        ]);

        Teacher::create([
            'name' => 'Eveline Nooijen',
        ]);

        Teacher::create([
            'name' => 'Eric Kuijpers',
        ]);
        
        Teacher::create([
            'name' => 'Carron Schilders',
        ]);
        
    }
}
