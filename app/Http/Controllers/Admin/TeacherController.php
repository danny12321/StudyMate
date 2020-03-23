<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Get
    public function index() {
        
        return view('admin.teachers.index', [
            'teachers' => Teacher::get()
        ]);
    }

    // GET
    public function new() {
        return view('admin.teachers.new');
    }

    // Post
    public function create() {
        $teacher = new Teacher();
        $teacher->name = request('name');
        $teacher->save();
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
