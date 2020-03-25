<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class DashboardController extends Controller
{
    public function index() {
        $courses = Course::all();
        $coursesDone = $courses->where('deadline_done', true);
        $currStudyPoints = $coursesDone->sum('study_points');
        $maxStudyPoints = $courses->sum('study_points');
        $maxBlock = $courses->max('block');

        $pointsPerBlock = array_fill(0, $maxBlock, [
            'achieved' => 0,
            'total' => 0
        ]);

        foreach($courses as $course) {
            if($course->deadline_done) {
                $pointsPerBlock[$course->block - 1]['achieved'] += $course->study_points;
            }
            $pointsPerBlock[$course->block - 1]['total'] += $course->study_points;
        }

        return view('dashboard.index', [
            'courses' => $coursesDone,
            'maxBlock' => $maxBlock,
            'currStudyPoints' => $currStudyPoints,
            'maxStudyPoints' => $maxStudyPoints,
            'pointsPerBlock' => $pointsPerBlock
        ]);
    }
}
