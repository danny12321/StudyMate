<?php

namespace App\Http\Controllers;

use App\Course;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeadlineController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    //
    public function index()
    {
        $order = request('order') === 'desc' ? 'desc' : 'asc';
        $sort = request('sort');
        $courses = $this->getSortedCourses($sort, $order);

        return view('deadline.index', [
            'courses' => $courses,
            'order' => $order,
            'sort' => $sort
        ]);
    }

    protected function getSortedCourses($key, $order)
    {

        switch ($key) {
            case 'course':
                return Course::orderBy('name', $order)->get();

            case 'deadline':
                return Course::orderBy('deadline', $order)->get();

            case 'categorie':
                return Course::join('assessment_types', 'assessment_types.id', '=', 'courses.assessment_type')
                    ->orderBy('assessment_types.type', $order)
                    ->get(['courses.*']);

            case 'coordinator':
                if ($order === 'asc') {
                    return Course::get()->sortBy(function ($course, $key) {
                        return $course->coordinator->name;
                    })->values()->all();;
                } else {
                    return Course::get()->sortByDesc(function ($course, $key) {
                        return $course->coordinator->name;
                    })->values()->all();;
                }

            default:
                return Course::get();
        }
    }

    // Get
    public function edit(Course $course)
    {
        return view('deadline.edit', [
            'course' => $course,
            'tags' => Tag::all()
        ]);
    }

    // Put
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        request()->validate([
            'deadline' => ['required'],
            'tags' => 'array'
        ]);

        $name = $course->name . '-' . $course->id . '.zip';
        $request->file('attachment')->storeAs('attachments', $name);


        $course->update([
            'deadline'=>request('deadline'),
            'path_to_zip' => $name
        ]);

        $course->tags()->sync(request('tags'));

        return redirect()->route('deadline');
    }

    public function done(Course $course) {
        $course->update([
            'deadline_done' => true
        ]);

        return redirect()->route('deadline');
    }

    public function download(Course $course) {
        $path = $course->path_to_zip;

        return Storage::download('attachments/' . $path);
    }
}
