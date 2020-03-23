<?php

use Illuminate\Database\Seeder;
use App\AssessmentType;

class AssessmentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssessmentType::create([
            'type' => 'Toets',
        ]);

        AssessmentType::create([
            'type' => 'Assessment',
        ]);
    }
}
