<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class DashboardController extends Controller
{
    //

    public function index() {
        return view('dashboard.index', [
            'courses' => Course::get()
        ]);
    }
}
