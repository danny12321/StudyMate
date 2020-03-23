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
    public function index() {
        $courses = Course::take(3)->get();

        return view('deadline.index', [
            'courses' => $courses
        ]);
    }
}
