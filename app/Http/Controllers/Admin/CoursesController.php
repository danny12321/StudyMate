<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Teacher;
use App\AssessmentType;

class CoursesController extends Controller
{
    // Get
    public function index() {
        
        return view('admin.courses.index', [
            'courses' => Course::get()
        ]);
    }

    // GET
    public function new() {

        return view('admin.courses.new', [
            'teachers' => Teacher::all(),
            'assessment_types' => AssessmentType::all()
        ]);
    }

    // Post
    public function create() {
        $course = new Course();
        $course->name = request('name');
        $course->coordinator = request('coordinator');
        $course->path_to_zip = null;
        $course->assessment_type = request('assessmenttype');
        $course->study_points = request('studypoints');
        $course->block = request('block');
        $course->deadline = request('deadline');
        $course->deadline_done = false;
        $course->save();
        return redirect()->route('admin_teacher');
    }

    // Get
    public function edit(){

    }

    // Put
    public function update() {

    }

    // Delete
    public function destroy(){

    }
}
