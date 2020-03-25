<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class DashboardController extends Controller
{
    public function index() {
        $maxBlock = 0;
        foreach (Course::get() as $course) {
            if($course->block > $maxBlock) $maxBlock = $course->block;
        }

        return view('dashboard.index', [
            'courses' => Course::get(),
            'maxBlock' => $maxBlock
        ]);
    }
}
