<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Get
    public function index()
    {
        return view('admin.teachers.index', [
            'teachers' => Teacher::get()
        ]);
    }

    // GET
    public function new()
    {
        return view('admin.teachers.new');
    }

    // Post
    public function create()
    {
        Teacher::create($this->validateTeacher());

        return redirect()->route('admin_teacher');
    }

    // Get
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', [
            'teacher' => $teacher
        ]);
    }

    // Put
    public function update(Teacher $teacher)
    {
        $teacher->update($this->validateTeacher());

        return redirect()->route('admin_teacher');
    }

    // Delete
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin_teacher');
    }

    protected function validateTeacher()
    {
        return request()->validate([
            'name' => ['required'],
        ]);
    }
}
