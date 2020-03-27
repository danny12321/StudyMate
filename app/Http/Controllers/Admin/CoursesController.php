<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Teacher;
use App\AssessmentType;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
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
        
        request()->validate([
            'name' => ['required'],
            'coordinator' => ['required'],
            'assessmenttype' => ['required'],
            'studypoints' => ['required'],
            'block' => ['required'],
            'teachers' => 'required|array'
        ]);

        $course = new Course();
        $course->name = request('name');
        $course->coordinator_id = request('coordinator');
        $course->path_to_zip = null;
        $course->assessment_type = request('assessmenttype');
        $course->study_points = request('studypoints');
        $course->block = request('block');
        $course->deadline = null;
        $course->deadline_done = false;
        $course->save();
        $course->teachers()->attach(request('teachers'));

        return redirect()->route('admin_course');
    }

    // Get
    public function edit(Course $course){
        return view('admin.courses.edit', [
            'course' => $course,
            'teachers' => Teacher::all(),
            'assessment_types' => AssessmentType::all()
        ]);
    }

    // Put
    public function update(Course $course) {
        
        request()->validate([
            'name' => ['required'],
            'coordinator' => ['required'],
            'assessmenttype' => ['required'],
            'studypoints' => ['required'],
            'block' => ['required'],
            'teachers' => 'required|array'
        ]);
        
        $course->name = request('name');
        $course->coordinator_id = request('coordinator');
        $course->path_to_zip = null;
        $course->assessment_type = request('assessmenttype');
        $course->study_points = request('studypoints');
        $course->block = request('block');
        $course->deadline = null;
        $course->deadline_done = false;
        $course->save();
        $course->teachers()->sync(request('teachers'));

        return redirect()->route('admin_course');
    }

    // Delete
    public function destroy(Course $course){
        $course->delete();
        return redirect()->route('admin_course');
    }
}
