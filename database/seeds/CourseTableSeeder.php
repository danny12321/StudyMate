<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Course::create([
            'name' => 'gesprekken',
            'coordinator_id' => 2,
            'assessment_type' => 2,
            'study_points' => 2,
            'grade' => 6,
            'block' => 7,
            'deadline' => '2019-03-02',
            'deadline_done' => true
        ]);

        Course::create([
            'name' => 'nederlands',
            'coordinator_id' => 3,
            'assessment_type' => 1,
            'study_points' => 2,
            'grade' => 7,
            'block' => 6,
            'deadline' => '2019-06-02',
            'deadline_done' => true
        ]);

        Course::create([
            'name' => 'Webphp',
            'coordinator_id' => 1,
            'assessment_type' => 2,
            'study_points' => 3,
            'grade' => 8,
            'block' => 7,
            'deadline' => '2020-03-30',
            'deadline_done' => false
        ]);
    }
}
