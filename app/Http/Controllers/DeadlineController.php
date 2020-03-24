<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    //
    public function index()
    {
        $courses = Course::get();

        
        return view('deadline.index', [
            'courses' => $courses
        ]);
    }

    // Get
    public function edit(Course $course)
    {
        return view('deadline.edit', [
            'course' => $course
        ]);
    }

    // Put
    public function update(Course $course)
    {
        $course->update(request()->validate([
            'deadline' => ['required'],
        ]));

        return redirect()->route('deadline');
    }
}
