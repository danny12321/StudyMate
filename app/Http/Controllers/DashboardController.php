<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class DashboardController extends Controller
{
    public function index() {
        $courses = Course::where('deadline_done', true)->get();
        $maxBlock = $courses->max('block');
        $currStudyPoints = $courses->sum('study_points');
        $maxStudyPoints = Course::sum('study_points');

        return view('dashboard.index', [
            'courses' => $courses,
            'maxBlock' => $maxBlock,
            'currStudyPoints' => $currStudyPoints,
            'maxStudyPoints' => $maxStudyPoints
        ]);
    }
}
